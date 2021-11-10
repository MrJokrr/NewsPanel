@extends('layouts.admin_layout')

@section('title', 'Добавить категорию')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create new post</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="Type post name" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="text" class="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="scales" name="active" checked>
                                    <label for="scales">Active</label>
                                </div>
                                <div class="form-group">
                                    <img alt="" class="img-uploaded" style="display: block; width: 350px">
                                    <label for="feature_image" class="mt-4">Feature Image</label>
                                    <input type="text" class="form-group" id="feature_image" name="image" value=""
                                    readonly>
                                    <a href="" class="popup_selector btn btn-primary" data-inputid="feature_image">Select Image</a>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" style="width: 150px; height: 30px"><Add><p style="margin-top: -5px;">Add post</p></Add></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
