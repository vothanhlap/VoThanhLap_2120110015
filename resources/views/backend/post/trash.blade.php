@extends('layouts.admin')
@section('title', 'thùng rác bai viet')
@section('header')
<link rel="stylesheet" href="{{ asset('public/jquery.dataTables.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('public/jquery.dataTables.min.js') }}"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">THÙNG RÁC bai viet</strong>
                    </div>
                    <div class="col-md-6 text-right">       
                                <a href="{{ route('post.index') }}"class="btn btn-sm btn-success">
                                    <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                                </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                            <th style="width:30px" class="text-center">#</th>
                            <th style="width:90px" class="text-center">Hình đại diện</th>
                            <th style="width:100px" class="text-center">Tên danh mục</th>
                            <th style="width:100px" class="text-center">Chủ đề bài viết</th>
                            <th style="width:100px" class="text-center">Ngày đăng</th>
                            <th style="width:150px" class="text-center">Chức năng</th>
                            <th style="width:30px" class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_post as $post)
                                <tr>
                                    <td  class="text-center align-middle">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center align-middle">
                                        {{-- <img style="width:80px" class="img-fluid" src="{{ asset('images/post/' . $post->image) }}"
                                            alt="{{ $post->image }}"> --}}
                                    </td>
                                    <td class="text-center align-middle">{{ $post->title }}</td>
                                    <td class="text-center align-middle">{{ $post->chude }}</td>
                                    <td class="text-center align-middle">{{ $post->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('post.restore', ['post' => $post->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                        <a href="{{ route('post.destroy', ['post' => $post->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                    <td>{{ $post->id }}</td>
                                </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection


     {{-- <!-- Content Header (post header) -->
     <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh mục sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tất cả danh mục sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="far fa-file-times"></i>Xóa</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('post.index') }}"class="btn btn-sm btn-success">
                            <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @includeIf('backend.message_alert')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:30px" class="text-center">#</th>
                            <th style="width:90px" class="text-center">Hình đại diện</th>
                            <th>Tên danh mục</th>
                            <th>slug</th>
                            <th>Ngày đăng</th>
                            <th style="width:280px" class="text-center">Chức năng</th>
                            <th style="width:30px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_post as $post)
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/post/' . $post->image) }}"
                                        alt="{{ $post->image }}">
                                </td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->slug }}</td>
                                <td class="text-center">{{ $post->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('post.restore', ['post' => $post->id]) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                    <a href="{{ route('post.destroy', ['post' => $post->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                </td>
                                <td>{{ $post->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content --> --}}