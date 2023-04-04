@extends('layouts.admin')
@section('title', 'Chi tiết menu')
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
                            <strong class="text-danger text-uppercase" >Chi tiết menu</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('menu.edit', ['menu' => $menu->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('menu.destroy', ['menu' => $menu->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('menu.index') }}"class="btn btn-sm btn-success">
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
                        <tr>
                            <td>Tên Menu</td>
                            <td>{{ $menu->name }}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{ $menu->link }}</td>
                        </tr>
                        <tr>
                            <td>Sắp xếp</td>
                            <td>{{ $menu->sort_order}}</td>
                        </tr>
                        <tr>
                            <td>Cấp cha</td>
                            <td>{{ $menu->parent_id }}</td>
                        </tr>
                        <tr>
                            <td>Kiểu</td>
                            <td>{{ $menu->type }}</td>
                        </tr>
                        <tr>
                            <td>Người tạo</td>
                            <td>{{ $menu->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $menu->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $menu->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $menu->updated_at }}</td>
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
