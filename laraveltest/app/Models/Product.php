<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use ElasticquentTrait;
    protected $table = 'products';
    protected $guarded = ['id'];
    public $timestamps = true;

    /**
     * The elasticsearch settings.
     *
     * @var array
     */
    protected $mappingProperties = array(
        'name' => [
            'type' => 'text',
            'analyzer' => 'standard',
        ],
        'title' => [
            'type' => 'text',
            'analyzer' => 'standard',
        ],
        'description' => [
            'type' => 'text',
            'analyzer' => 'standard',
        ],
        'price' => [
            'type' => 'short',
        ],
    );
    /**
     * override route key
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'alias';
    }

    /**
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param int $limit
     * @return Elasticquent\ElasticquentPaginator
     */
    public static function searchProducts(\Illuminate\Http\Request $request, $limit)
    {
        $page = \Elasticquent\ElasticquentPaginator::resolveCurrentPage() ? : 1;
        $offset = ($page - 1) * $limit;

        $query = [
            'bool' => [
                'must' => [
                    [
                        'bool' => [
                            'should' => [
                                ['term' => ['name' => $request->input('q')]]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        if ($request->input('title')) {
            $query['bool']['must'][0]['bool']['should'][] = ['term' => ['title' => $request->input('q')]];
        }
        if ($request->input('description')) {
            $query['bool']['must'][0]['bool']['should'][] = ['term' => ['description' => $request->input('q')]];
        }
        if ($request->input('price_low')) {
            $query['bool']['must'][] = ['range' => ['price' => ['gt' => $request->input('price_low')]]];
        }
        if ($request->input('price_high')) {
            $query['bool']['must'][] = ['range' => ['price' => ['lt' => $request->input('price_high')]]];
        }
        $products = Product::searchByQuery($query, null, null, $limit, $offset)->paginate($limit);

        return $products;
    }
}
