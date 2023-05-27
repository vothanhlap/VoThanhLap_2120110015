@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
 <section class="section-conten padding-y" style="min-height:84vh">

    <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
          <div class="card-body">
          <h4 class="card-title mb-4 text-center">ĐĂNG NHẬP</h4>
          <form action="{{route('xulydangnhap')}}" method="post">
            @method('POST')
            @csrf
              <div class="form-group">
                 <input name="username" class="form-control" placeholder="Nhập email hoặc tên đăng nhập" type="text">
                 @if ($errors->has('username'))
                 <div class="text-danger mt-2">
                     {{ $errors->first('username') }}
                 </div>
             @endif
                </div> <!-- form-group// -->
              <div class="form-group">
                <input  id="myInput" name="password" class="form-control" placeholder="Nhập mật khẩu" type="password">
                @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            @endif
              </div> <!-- form-group// -->
              <input class="mb-2" type="checkbox" onclick="myFunction()"> Hiện thị mật khẩu
              <div class="form-group">
                  <a href="" class="float-right">Quên mật khẩu?</a> 
                <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label">Nhớ mật khẩu</div> </label>
              </div> <!-- form-group form-check .// -->
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" >ĐĂNG NHÂP</button>
              </div> <!-- form-group// -->    
          </form>
          </div> <!-- card-body.// -->
        </div> <!-- card .// -->
    
         <p class="text-center mt-4">Bạn chưa có tài khoản ? <a href="{{route('login.dangki')}}">Đăng kí</a></p>
         <br><br>
    <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
    <script>
      function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
      }
  </script>
    
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->  

@endsection