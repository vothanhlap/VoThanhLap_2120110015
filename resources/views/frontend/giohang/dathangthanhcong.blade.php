@extends('layouts.site')
@section('title', 'Đặt hàng thành công')
@section('content')
      <section class="text-center">
        <h3 class="mt-4">XIN CHÀO! {{$order->fullname}}</h3>
        <p>Bạn đã đặt thành công một đơn hàng.Shop xin cảm ơn bạn đã mua hàng tại shop chúng tôi! </p>
        <span>Đơn hàng của bạn đã đươc giửi đến gmail <a href="https://mail.google.com">{{$order->email}}</a>. Bạn vui lòng kiểm tra gmail của các bạn để theo dõi được hàng trình của đơn hàng</span>
      </section>
      
      <div class="card-body">
        <a href="{{ route('frontend.home') }}" class="btn btn-light"> <i
                class="fa fa-chevron-left"></i>Tiếp tục mua sắm </a>

                <a href="{{ route('giohang.status') }}" class="btn btn-light"> <i
                class="fa fa-chevron-left"></i>Theo dõi trạng thái đơn hàng </a>
    </div>
@endsection