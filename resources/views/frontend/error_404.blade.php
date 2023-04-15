@extends('layouts.site')
@section('title', 'error_404')
@section('content')
<div class="container text-center">
    <div class="logo-404">
        <a href="{{route('frontend.home')}}"><img style="width:220px;" class="mt-4 img-fluid" src="{{asset('images/logo/logo.png')}}" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="{{asset('images/404/404.png')}}" class="img-responsive" alt="" />
        <h1><b>Ôi hỏng!</b>  Chúng tôi không thể tìm thấy trang này</h1>
        <p>Uh... Vì vậy, có vẻ như bạn đã phá vỡ một cái gì đó. Trang bạn đang tìm kiếm đã xuất hiện và biến mất..</p>
        <h2><a href="{{route('frontend.home')}}">Trở về trang chủ</a></h2>
    </div>
</div>
@endsection
