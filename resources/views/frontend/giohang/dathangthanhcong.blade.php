@extends('layouts.site')
@section('title', 'Đặt hàng thành công')
@section('content')
      <section class="text-center">
        <h1>XIN CHÀO! TÊN KHÁCH HÀNG</h1>
        <p>Bạn đã đặt thành công một đơn hàng.Shop xin cảm ơn bạn đã mua hàng tại shop chúng tôi! </p>
        <span>Bạn vui lòng kiểm tra gmail của các bạn để theo dõi được hàng trình của đơn hàng</span>
      </section>
      <div class="card-body">

        <a href="{{ route('frontend.home') }}" class="btn btn-light"> <i
                class="fa fa-chevron-left"></i>Tiếp tục mua sắm </a>
    </div>
@endsection