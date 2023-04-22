@extends('layouts.admin')
@section('title', 'Chi tiết trang đơn')
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
                            <strong class="text-danger text-uppercase" > chi tiết trang đơn</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('page.edit', ['page' => $page->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('page.destroy', ['page' => $page->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('page.index') }}"class="btn btn-sm btn-info">
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
                            <td>
                                <img style="width:80px" class="img-fluid" src="{{ asset('images/page/' . $page->image) }}"
                                    alt="{{ $page->image }}">
                            </td>
                        <tr>
                            <td>Tên chủ đề</td>
                            <td>{{ $page->title }}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{ $page->slug }}</td>
                        </tr>
                        <tr>
                            <td>Danh mục cha</td>
                            <td>{{ $page->parent_id }}</td>
                        </tr>
                        <tr>
                            <td>Từ khóa</td>
                            <td>{{ $page->metakey }}</td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>{{ $page->metadesc }}</td>
                        </tr>
                        <tr>
                            <td> Người tạo   </td>
                            <td>{{ $page->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $page->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $page->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $page->updated_at }}</td>
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
