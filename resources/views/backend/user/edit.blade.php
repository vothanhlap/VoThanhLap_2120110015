@extends('layouts.admin')
@section('title', 'Cập nhật user')
@extends('backend.dashboard.menuadmin')
@section('content')
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content my-3">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="text-danger text-uppercase">CẬP NHẬT USER</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Lưu[Cập nhật]
                                </button>
                                <a href="{{ route('user.index') }}"class="btn btn-sm btn-info">
                                    <i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @includeIf('backend.message_alert')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="name " class="text-danger">Tên tài khoản</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        id="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label  for="username" class="text-danger">Tên Username</label>
                                    <input type="text" readonly name="username" value="{{ old('username', $user->username) }}"
                                        id="username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="text-danger">Mật khẩu</label>
                                    <input type="text" readonly name="password" value="{{ old('password', $user->password) }}"
                                        id="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="text-danger">Email</label>
                                    <input type="text" name="email" value="{{ old('email', $user->email) }}"
                                        id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="text-danger">Địa chỉ</label>
                                    <input type="text" name="address" value="{{ old('address', $user->address) }}"
                                        id="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="phone" class="text-danger">Số điện thoại</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                        id="phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="roles" class="text-danger">Quyền tri cập</label>
                                    <select class="form-control" name="roles" id="roles">
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Biên tập viên</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="roles" class="text-danger">Giới tính</label>
                                    <select class="form-control" name="roles" id="roles">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="text-danger">Trạng thái</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Xuất bản</option>
                                        <option value="0">Chưa xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </section>

            <!-- Main content -->
            <!-- /.content -->
        </div>
    </form>
@endsection
