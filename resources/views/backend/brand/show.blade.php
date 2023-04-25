@extends('layouts.admin')
@section('title', 'Chi tiết thương hiệu'.'-'.$brand->name)
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
                            <strong class="text-danger text-uppercase" >Chi tiết thương hiệu sản phẩm</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('brand.edit', ['brand' => $brand->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('brand.destroy', ['brand' => $brand->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('brand.index') }}"class="btn btn-sm btn-success">
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
                                <img style="width:80px" class="img-fluid" src="{{ asset('images/brand/' . $brand->image) }}"
                                    alt="{{ $brand->image }}">
                            </td>
                        <tr>
                            <td>Name</td>
                            <td>{{ $brand->name }}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{ $brand->slug }}</td>
                        </tr>
                        <tr>
                            <td>Sắp xếp</td>
                            <td>{{ $brand->sort_order}}</td>
                        </tr>
                        <tr>
                            <td>Từ khóa</td>
                            <td>{!!$brand->metakey!!}</td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>{!!$brand->metadesc!!}</td>
                        </tr>
                        <tr>
                            <td>Người tạo</td>
                            <td>{{ $brand->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $brand->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $brand->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $brand->updated_at }}</td>
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
