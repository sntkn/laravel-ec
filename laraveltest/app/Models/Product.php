<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

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
    protected $indexSettings = [];
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
     * @param string $query
     * @param int $limit
     * @return Elasticquent\ElasticquentPaginator
     */
    public static function searchProducts($query, $limit)
    {
        $page = \Elasticquent\ElasticquentPaginator::resolveCurrentPage() ? : 1;
        $offset = ($page - 1) * $limit;
        $products = Product::searchByQuery(
            ['match' => ['name' => $query]],
            null,
            null,
            $limit,
            $offset
        )->paginate($limit);

        return $products;
    }
}
