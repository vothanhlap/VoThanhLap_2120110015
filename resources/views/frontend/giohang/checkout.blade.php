@extends('layouts.site')
@section('title', 'Thanh toán đơn hàng')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
       <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="container" style="max-width: 720px;">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Thông tin thanh toán</h4>
                            <div class="col form-group">
                                <label>Họ và tên khách hàng</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group ">
                                <label>Địa chỉ</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div> <!-- container .//  -->
            </div>
            <div class="col-md-6">
                thông tin sản phẩm
            </div>
        </div>
       </div>
       <div class="card-body">
        <a type="submit" href="{{route('giohang.dathangthanhcog')}}" class="btn btn-primary float-md-right payment">Đặt hàng</a>
        <a href="{{ route('frontend.home') }}" class="btn btn-light"> <i
                class="fa fa-chevron-left"></i>Tiếp tục mua sắm </a>
    </div>
    </section>
@endsection
<script>

    $('.payment').click(function(){


    });
</script>
