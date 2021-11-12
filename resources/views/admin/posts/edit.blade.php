@extends('layouts.admin_layout')

@section('title', 'Редактировать статью')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать статью: {{ $post['title'] }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('post.update', $post['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{ $post['name'] }}" name="title" class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите название статьи" required>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <p class="text-bold">Text</p>
                                    <textarea name="text" class="editor col-5" style="min-height: 300px">{{ $post['text'] }}</textarea>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <input type="checkbox" id="scales" name="active" checked>
                                    <label for="scales">Active</label>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Poster image</label>
                                    <img src="{{ $post['image'] }}" alt="" class="img-uploaded"
                                         style="display: block; width: 300px">
                                    <input type="text" name="image" class="form-control"
                                           id="feature_image" name="feature_image" value="{{ $post['image'] }}" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                                </div>
                                    <br>
                                <div class="form-group">
                                    <p class="text-bold">Tags</p>
                                    <textarea name="tags" class="editor col-5" style="min-height: 300px">{{ $post['tags'] }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
