@extends('layouts.ui_layout')

@section('title', 'Post View')

@section('content')


    <div>
        <nav class="bg-light border-bottom">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto">
                    @if(url()->current()!=url()->previous())
                        <li class="nav-item"><a href="{{ url()->previous() }}" class="nav-link link-dark px-2 active fs-3 text-muted" aria-current="page">
                                get back</a></li>
                    @endif
                        <li class="nav-item"><p class="nav-link link-dark px-2 active fs-3 text-bold" aria-current="page">{{ $post['name'] }}</p></li>
                </ul>
            </div>
        </nav>

    </div>
    <div class="p-5 mb-0 bg-light rounded-3">
        <h2>{{ $post['name'] }}</h2>
        <p class="text-muted">{{ $post['created_at'] }}</p>
        <div class="container-fluid py-2">
            <img src="{{ $post['image'] }}" alt="" class="img-uploaded"
                 style="display: block; height: 400px">
            <p class="col-md-7 fs-3 pt-4">{{ $post['text'] }}</p>
        </div>
    </div>
    <div class="ml-4">
{{--            <a href="{{ route('show', $prevPost['id']) }}" class="btn btn-secondary my-2">Previous post</a>;--}}
{{--            <a href="{{ route('show', $nextPost['id']) }}" class="btn btn-secondary my-2">Second post</a>;--}}
            <a href="{{ route('show', $post['id']) }}" class="btn btn-secondary my-2">Previous post</a>
            <a href="{{ route('show', $post['id']) }}" class="btn btn-secondary my-2">Second post</a>
    </div>
@endsection
