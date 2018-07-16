<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $fillable = ['name', 'alias', 'title', 'description', 'price'];

    /**
     * override route key
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'alias';
    }
}
