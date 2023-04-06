@extends('layouts.site')
@section('title', 'Khoi phục mật khẩu')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

    <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
          <div class="card-body">
          <h4 class="card-title mb-4 text-center">NHẬP MẬT KHẨU MỚI</h4>
          <form action="{{route('login.xulyyeucaumatkhaumoi')}}" method="post">
            @method('POST')
            @csrf
              <div class="form-group">
                 <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu mới">
              </div> <!-- form-group// -->
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới">
             </div> <!-- form-group// -->
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">KHỘI PHỤC MẬT KHẨU</button>
              </div> <!-- form-group// -->    
          </form>
          </div> <!-- card-body.// -->
        </div> <!-- card .// -->
    <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
    
    
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->  

@endsection