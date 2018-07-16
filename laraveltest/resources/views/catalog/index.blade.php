@php
    $title = __('Posts');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <hr>
    @foreach($products->chunk(3) as $items)
    <div class="row">
        @foreach($items as $item)
        <div class="col-4 border p-3">
            <div class="text-center">
                <a href="{{ url('/' . $item->alias) }}">
                    <img src="/images/book_doujinshi.png" class="p-sm img-thumbnail">
                </a>
            </div>
            <h3>
                {{$item->price}}
            </h3>
            <h4>
            <a href="{{ url('/' . $item->alias) }}">
                {{ $item->name }}
            </a>
            </h4>
        </p>
        </div>
        @endforeach
    </div>
    @endforeach
    <hr>
    {{ $products->links() }}
</div>
@endsection
