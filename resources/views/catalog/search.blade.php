@extends('layouts.my')
@section('title', 'Search Results')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            @include('layouts.product_search_sidebar')
        </div>
        <div class="col-10">
            <h1 id="post-title">Results</h1>
            @component('components.products_list')
                @slot('products', $products)
            @endcomponent
        </div>
</div>
@endsection
