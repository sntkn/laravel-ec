@extends('layouts.my')
@section('title', 'Edit' . ': ' . $post->title)
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('posts/'.$post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title', $post->title) }}" required autofocus>
            @if ($errors->has('title'))
            <span class="invalid-feedback">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">{{ __('Body') }}</label>
            <textarea id="body" class="form-control @if ($errors->has('body')) is-invalid @endif" name="body" rows="8" required>{{ old('body', $post->body) }}</textarea>
            @if ($errors->has('body'))
            <span class="invalid-feedback">{{ $errors->first('body') }}</span>
            @endif
        </div>
        <button type="submit" name="submit" class="btn btn-success">{{ __('Submit') }}</button>
    </form>
</div>
@endsection
