@extends('layouts.layout')
@section('title', 'Đăng ký thành viên')
@section('content')
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h3 class="text-danger text-uppercase">ĐĂNG KÝ THÀNH VIÊN</h3>
      </div>
      <div class="card-body">
        <form action="{{route('postdangky')}}" method="post">
            @method('POST')
            @csrf
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Họ và tên đầy đủ">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('name'))
          <div class="text-danger mb-2">
              {{ $errors->first('name') }}
          </div>
      @endif
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('username'))
          <div class="text-danger mb-2">
              {{ $errors->first('username') }}
          </div>
      @endif
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('email'))
          <div class="text-danger mb-2">
              {{ $errors->first('email') }}
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
          <div class="input-group mb-3">
            <input type="password" name="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('passwordAgain'))
          <div class="text-danger mb-2">
              {{ $errors->first('passwordAgain') }}
          </div>
      @endif
          <div class="input-group mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('phone'))
          <div class="text-danger mb-2">
              {{ $errors->first('phone') }}
          </div>
      @endif
          <div class="input-group mb-3">
            <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('address'))
          <div class="text-danger mb-2">
              {{ $errors->first('address') }}
          </div>
      @endif
          <div class="">
            <div class="col-12">
              <div class="icheck-primary mt-2">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 Tôi đồng ý với  điều khoản
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="{{route('login')}}" class="text-center">Quay về đăng nhập</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection