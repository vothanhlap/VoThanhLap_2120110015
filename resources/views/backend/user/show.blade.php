@extends('layouts.admin')
@section('title', 'Chi tiết user')
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
                            <strong class="text-danger text-uppercase" > chi tiết user</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('user.edit', ['user' => $user->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('user.destroy', ['user' => $user->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('user.index') }}"class="btn btn-sm btn-info">
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
                            <td>{{ $user->name}}</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>
                                @if (( $user->geder)==1)
                                    Nam
                                @else
                                    Nữ
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td> Người tạo   </td>
                            <td>{{ $user->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $user->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $user->updated_at }}</td>
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
