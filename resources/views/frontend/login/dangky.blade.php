@extends('layouts.site')
@section('title', 'Đăng ký tài khoản')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
        <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
            <article class="card-body">
                <header class="mb-4 text-center">
                    <h4 class="card-title">ĐĂNG KÝ TÀI KHOẢN</h4>
                </header>
                <form action="{{ route('login.xulydangki') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-row">
                        <label>Họ và Tên</label>
                        <input type="text" name="fullname" class="form-control" placeholder="">
                        @if ($errors->has('fullname'))
                        <div class="text-danger mb-2">
                            {{ $errors->first('fullname') }}
                        </div>
                    @endif
                    </div> <!-- form-row end.// -->
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        @if ($errors->has('email'))
                        <div class="text-danger mb-2">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" checked="" type="radio" name="gender"
                                value="1">
                            <span class="custom-control-label"> Nam </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="gender" value="0">
                            <span class="custom-control-label"> Nữ </span>
                        </label>
                        @if ($errors->has('gender'))
                        <div class="text-danger mb-2">
                            {{ $errors->first('gender') }}
                        </div>
                    @endif
                    </div> <!-- form-group end.// -->
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control">
                            @if ($errors->has('phone'))
                            <div class="text-danger mb-2">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Tên tài khoản</label>
                            <input type="text" name="username" class="form-control">
                            @if ($errors->has('username'))
                            <div class="text-danger mb-2">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Mật khẩu</label>
                            <input class="form-control" name="password" type="password">
                            @if ($errors->has('password'))
                            <div class="text-danger mb-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Nhập lại mật khẩu</label>
                            <input class="form-control" name="passwordAgain" type="password">
                            @if ($errors->has('passwordAgain'))
                            <div class="text-danger mb-2">
                                {{ $errors->first('passwordAgain') }}
                            </div>
                        @endif
                        </div> <!-- form-group end.// -->
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea name="address" id="address" cols="30" rows="5"></textarea>
                        @if ($errors->has('address'))
                        <div class="text-danger mb-2">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Đăng ký </button>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <label class="custom-control custom-checkbox"> 
                            <input type="checkbox" class="custom-control-input"
                                name="checkbox">
                             
                            <div class="custom-control-label"> Tôi đồng ý <a href="#">với điều khoản của shop</a>
                            </div>
                        </label>
                        @if ($errors->has('checkbox'))
                        <div class="text-danger mb-2">
                            {{ $errors->first('checkbox') }}
                        </div>
                    @endif
                    </div> <!-- form-group end.// -->
                </form>
            </article><!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Đã có tài khoản? <a href="">Đăng nhập</a></p>
        <br><br>
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
