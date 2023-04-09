@extends('layouts.admin')
@section('title', 'Tất cả bai viet')
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
   <!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">TẤT CẢ bai viet</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('post.create') }}"class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('post.trash') }}"class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @includeIf('backend.message_alert')
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:10px" class="text-center">#</th>
                            <th style="width:80px" class="text-center">Hình đại diện</th>
                            <th style="width:120px" class="text-center">Tên danh mục</th>
                            <th style="width:120px" class="text-center">Chủ đề bài viết</th>
                            <th style="width:100px" class="text-center">Ngày đăng</th>
                            <th style="width:150px" class="text-center">Chức năng</th>
                            <th style="width:10px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_post as $post)
                        @php
                        $arr_image = $post->postimg;
                        $image = 'hinh.png';
                        if (count($arr_image) > 0) {
                            $image = $arr_image[1]['image'];
                        }
                       @endphp
                            <tr>
                                <td  class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center align-middle">
                                    <img style="width:80px" class="img-fluid" src="{{ asset('images/post/' . $image) }}"
                                        alt="{{ $image }}">
                                </td>
                                <td class="text-center align-middle">{{ $post->title }}</td>
                                <td class="text-center align-middle">{{ $post->chude }}</td>
                                <td class="text-center align-middle">{{ $post->created_at }}</td>
                                <td class="text-center align-middle">
                                    @if ($post->status == 1)
                                        <a href="{{ route('post.status', ['post' => $post->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                                    @else
                                        <a href="{{ route('post.status', ['post' => $post->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                                    @endif

                                    <a href="{{ route('post.edit', ['post' => $post->id]) }}"
                                        class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('post.show', ['post' => $post->id]) }}"
                                        class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                    <a href="{{ route('post.delete', ['post' => $post->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td class="text-center align-middle">{{ $post->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
