@extends('layouts.admin')
@section('title', $contact->name)
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
                            <strong class="text-danger text-uppercase">Chi tiết liên hệ</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('contact.destroy', ['contact' => $contact->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('contact.index') }}"class="btn btn-sm btn-success">
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
                            <td>Họ và tên liên hệ</td>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <td>Câu hỏi</td>
                            <td>{{ $contact->title }}</td>
                        </tr>
                        <tr>
                            <td>Trả lời</td>
                            <td>{{ $contact->content }}</td>
                        </tr>
                        <tr>
                            <td>Người phản hồi</td>
                            <td>{{ $contact->replay_id }}</td>
                        </tr>
                        <tr>
                            <td> Người tạo </td>
                            <td>{{ $contact->created_by }}</td>
                        </tr>
                        <tr>
                            <td>Người cập nhật</td>
                            <td>{{ $contact->updated_by }}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Ngày cập nhật</td>
                            <td>{{ $contact->updated_at }}</td>
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
