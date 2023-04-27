@extends('layouts.admin')
@section('title', 'Chi tiết bài viết'.'-'.$post->title)
@extends('backend.dashboard.menuadmin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content py-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase" >Chi tiết bài viết</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('post.edit', ['post' => $post->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('post.destroy', ['post' => $post->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('post.index') }}"class="btn btn-sm btn-success">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-body">
                    @includeIf('backend.message_alert')
                 
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:200px;color:red;text-align:center">Tiêu Đề</th>
                            <th style="color:green;text-align:center">Nội Dung</th>
                        </tr>
                        <td>Hình ảnh</td>
                            <td class=" align-middle">
                                <img style="width:80px" class="img-fluid" src="{{ asset('images/post/' . $post->image) }}"
                                    alt="{{ $post->image }}">
                            </td>
                        <tr>
                            <td class=" align-middle">Tên bài viết</td>
                            <td class=" align-middle">{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Slug</td>
                            <td class=" align-middle">{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Từ khóa</td>
                            <td class=" align-middle">{!!$post->metakey!!}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Mô tả</td>
                            <td class=" align-middle">{!!$post->metadesc!!}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Chi tiết bài viết</td>
                            <td class=" align-middle">{!!$post->detail  !!}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle"> Người tạo   </td>
                            <td class=" align-middle">{{ $post->created_by }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Người cập nhật</td>
                            <td class=" align-middle">{{ $post->updated_by }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Ngày tạo</td>
                            <td class=" align-middle">{{ $post->created_at }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Ngày cập nhật</td>
                            <td class=" align-middle">{{ $post->updated_at }}</td>
                        </tr>
                    </table>
                </div>
               
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            

        </section>
        <!-- /.content -->
    </div>
@endsection
