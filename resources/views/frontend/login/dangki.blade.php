@extends('layouts.site')
@section('title', 'Đăng ký tài khoản')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">

        <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
            <article class="card-body">
                <header class="mb-4">
                    @includeIf('backend.message_alert')
                    <h4 class="card-title text-center">ĐĂNG KÝ TÀI KHOẢN</h4>
                </header>
                <form action="{{ route('login.xulydangki') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input name="fullname" type="text" class="form-control" placeholder="Nhập tên của bạn">
                        @if ($errors->has('fullname'))
                        <div class="text-danger">
                            {{ $errors->first('fullname') }}
                        </div>
                    @endif
                      </div> <!-- form-row end.// -->
                   
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input name="username" type="text" class="form-control" placeholder="Nhập tên đăng nhập">
                        @if ($errors->has('username'))
                        <div class="text-danger">
                            {{ $errors->first('username') }}
                        </div>
                     @endif
                      </div> <!-- form-row end.// -->
                   
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Nhập địa chỉ email của bạn">
                        @if ($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                        <small class="form-text text-muted">Chúng tôi sẽ không chia se email của bạn cho bất kì ai.</small>
                    </div> <!-- form-group end.// -->
                   
                    <div class="form-group">
                      <label for="geder">Giới tính</label>
                      <select class="form-control" name="geder" id="geder">
                          <option value="1">Nam</option>
                          <option value="0">Nữ</option>
                      </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-row">
                        
                        <div class="form-group col-md-12">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control">
                            @if ($errors->has('address'))
                            <div class="text-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                          </div> <!-- form-group end.// -->
                      
                    </div> <!-- form-row.// -->
                    
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại">
                        @if ($errors->has('phone'))
                        <div class="text-danger">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                      </div> <!-- form-row end.// -->
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tạo một mật khẩu mới</label>
                            <input name="password" class="form-control" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Tạo một mật khẩu mới">
                            @if ($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                          </div> <!-- form-group end.// -->
                      
                        <div class="form-group col-md-6">
                            <label>Nhập lại mật khẩu</label>
                            <input name="passwordAgain" class="form-control" type="password"
                                placeholder="Nhập lại mật khẩu">
                                @if ($errors->has('passwordAgain'))
                                <div class="text-danger">
                                    {{ $errors->first('passwordAgain') }}
                                </div>
                            @endif
                              </div> <!-- form-group end.// -->  
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Đăng kí</button>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                    </div> <!-- form-group end.// -->
                </form>
            </article><!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Đã có tài khoản? <a href="{{ route('login.dangnhap') }}">Đăng nhập</a></p>
        <br><br>
        {{-- <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div> --}}
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

@endsection
