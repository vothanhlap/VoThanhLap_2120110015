@extends('layouts.layout')
@section('title', 'Khôi phục mật khẩu')
@section('content')
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <h3 class="text-danger text-uppercase">QUÊN MẬT KHÂỦ</h3>
    </div>
    <div class="card-body">
      <form action="{{route('recover')}}" method="post">
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Nhâp địa chỉ Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Yêu cầu mật khẩu mới</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{route('login')}}">Đăng nhập</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
