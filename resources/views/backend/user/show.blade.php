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
                            <td class=" align-middle">Tên</td>
                            <td class=" align-middle">{{ $user->name}}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">User</td>
                            <td class=" align-middle">{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Số điện thoại</td>
                            <td class=" align-middle">{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Giới tính</td>
                            <td>
                                @if (( $user->geder)==1)
                                    Nam
                                @else
                                    Nữ
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class=" align-middle"> Người tạo   </td>
                            <td class=" align-middle">{{ $user->created_by }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Người cập nhật</td>
                            <td class=" align-middle">{{ $user->updated_by }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Ngày tạo</td>
                            <td class=" align-middle">{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Ngày cập nhật</td>
                            <td class=" align-middle">{{ $user->updated_at }}</td>
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
