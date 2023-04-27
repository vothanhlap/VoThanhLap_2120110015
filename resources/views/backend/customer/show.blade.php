@extends('layouts.admin')
@section('title','Chi tiết khách hàng'.'-'. $customer->fullname)
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
                            <strong class="text-danger text-uppercase" > chi tiết khách hàng</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('customer.edit', ['customer' => $customer->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('customer.destroy', ['customer' => $customer->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('customer.index') }}"class="btn btn-sm btn-info">
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
                            <td>Tên</td>
                            <td>{{ $customer->fullname}}</td>
                        </tr>
                       
                        <tr>
                            <td>Email</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>
                                @if (($customer->geder)==1)
                                    Nam
                                @else
                                    Nữ
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td> Người tạo   </td>
                            <td>{{ $customer->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $customer->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $customer->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $customer->updated_at }}</td>
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
