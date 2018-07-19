<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Category as Category;

class CatalogController extends Controller
{
    const PER_PAGE = 12;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $category->products = $category->products()->paginate(self::PER_PAGE);
        return view('catalog.index')->with(compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->category = $product->category()->first();
        return view('catalog.show')->with(compact('product'));
    }
}
