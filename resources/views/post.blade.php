@extends('layouts.ui_layout')

@section('title', 'Post View')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">

        <div class="container-fluid py-5">
            <img src="{{ $post['image'] }}" alt="" class="img-uploaded"
                 style="display: block; height: 400px">
            {{ $post['name'] }}
            <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        </div>
    </div>
@endsection
