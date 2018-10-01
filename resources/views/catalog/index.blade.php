@extends('layouts.my')
@section('title', $category->name )
@section('content')
<div class="container">
    @component('components.category_breadcrumbs')
        @slot('category', $category)
    @endcomponent
    <h1 id="post-title">{{ $category->name }}</h1>
    @component('components.products_list')
        @slot('products', $category->products)
    @endcomponent
</div>
@endsection
