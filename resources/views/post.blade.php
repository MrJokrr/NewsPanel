@extends('layouts.ui_layout')

@section('title', 'Post View')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <h2>{{ $post['name'] }}</h2>
        <p class="text-muted">{{ $post['created_at'] }}</p>
        <div class="container-fluid py-2">
            <img src="{{ $post['image'] }}" alt="" class="img-uploaded"
                 style="display: block; height: 400px">
            <p class="col-md-8 fs-4">{{ $post['text'] }}</p>
        </div>
    </div>
@endsection
