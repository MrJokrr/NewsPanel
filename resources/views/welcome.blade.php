@extends('layouts.ui_layout')

@section('title', 'News')

@section('content')
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Welcome human, to topest of the topest news ever forever place in the world</h1>
                    <p class="lead text-muted">Right down, under this words, the same moment, same microsecond you watch first picture or read first letters, YOUR MIND WILL BLOW!
                        Don`t you ask your self, what must it to be to shock so extreemly? Just check it out..</p>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
                @foreach($posts as $post)

                        <div class="col">
                            <div class="card shadow-sm">

                                <img src="{{ $post['image'] }}">
                                <div class="pt-2 ml-2"><h4>{{ $post['name'] }}</h4></div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ $post['created_at'] }}</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('viewPosts', $post['id'])}}" class="text-muted">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                    <div>
                        {{ $posts->links() }}
                    </div>
{{--                </div>--}}
{{--                <div class="container">--}}
{{--                    @foreach($posts as $post)--}}
{{--                    {{ $post->name }}--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--                @if(true)--}}
{{--                    {{ $posts->render() }}--}}
{{--                @endif--}}
{{--                <div class="post_pagination">--}}
{{--                    <ul>--}}
{{--                        <li class="active"><a href="">1</a></li>--}}
{{--                        <li><a href="">2</a></li>--}}
{{--                        <li><a href="">3</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
        </div>
@endsection
