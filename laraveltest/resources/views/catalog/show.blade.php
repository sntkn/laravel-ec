@php
    $title = __('Posts');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    @component('components.category_breadcrumbs')
        @slot('category', $product->category)
    @endcomponent

    <h1 id="post-title">{{ $product->name }}</h1>
    <div class="text-center">
        <img src="/images/book_doujinshi.png" class="img-fluid" alt="Responsive image">
    </div>
    <p class="lead">{{ $product->title }}</p>
    <div  class="lead" id="product-description">
        {{ $product->description }}
    </div>
    <hr>
    <p class="lead">{{ $product->price }}</p>
</div>
@endsection
