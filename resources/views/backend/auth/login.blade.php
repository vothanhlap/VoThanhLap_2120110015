@extends('layouts.layout')
@section('title', 'Đăng nhập admin')
@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h3 class="text-danger text-uppercase">ĐĂNG NHẬP ADMIN</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('postlogin') }}" method="post">
                @method('POST')
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('username'))
                    <div class="text-danger mb-2">
                        {{ $errors->first('username') }}
                    </div>
                @endif
             
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                <div class="text-danger mb-2">
                    {{ $errors->first('password') }}
                </div>
                 @endif
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Nhớ mật khẩu
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">ĐĂNG NHẬP</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{route('forgotpassword')}}">Quên mật khẩu</a>
            </p>
            <p class="mb-0">
                <a href="{{route('dangky')}}" class="text-center">Đăng kí thành viên</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection
