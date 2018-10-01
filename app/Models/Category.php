<?php
namespace App\Models;

use Franzose\ClosureTable\Models\Entity;

class Category extends Entity implements CategoryInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $guarded = ['id'];
    public $timestamps = true;
//    protected $fillable = ['name'];
    /**
     * ClosureTable model instance.
     *
     * @var CategoryClosure
     */
    protected $closure = 'App\Models\CategoryClosure';

    /**
     * override route key
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     *
     * @return \App\Product
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
