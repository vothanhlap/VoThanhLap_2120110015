@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (order header) -->
        <!-- Main content -->
        <section class="content py-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase" > chi tiết đơn hàng </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('order.index') }}"class="btn btn-sm btn-info">
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
                                <img style="width:80px" class="img-fluid" src="{{ asset('images/order/' . $order->image) }}"
                                    alt="{{ $order->image }}">
                            </td>
                        <tr>
                            <td>Tên chủ đề</td>
                            <td>{{ $order->title }}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{ $order->slug }}</td>
                        </tr>
                        <tr>
                            <td>Danh mục cha</td>
                            <td>{{ $order->parent_id }}</td>
                        </tr>
                        <tr>
                            <td>Từ khóa</td>
                            <td>{{ $order->metakey }}</td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>{{ $order->metadesc }}</td>
                        </tr>
                        <tr>
                            <td> Người tạo   </td>
                            <td>{{ $order->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $order->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $order->updated_at }}</td>
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
