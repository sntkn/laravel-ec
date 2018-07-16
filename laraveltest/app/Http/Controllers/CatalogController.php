<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);

        return view('catalog.index')->with(compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Prodvuct $product
     * @return \Illuminate\Http\Response
     */
    public function show(Prodvuct $product)
    {
        return view('catalog.show')->with(compact('product'));
    }
}
