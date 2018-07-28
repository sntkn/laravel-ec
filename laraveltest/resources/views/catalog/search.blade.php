@extends('layouts.my')
@section('title', 'Search Results')
@section('content')
<div class="container">
    <h1 id="post-title">Results</h1>
    @component('components.products_list')
        @slot('products', $products)
    @endcomponent
</div>
@endsection
