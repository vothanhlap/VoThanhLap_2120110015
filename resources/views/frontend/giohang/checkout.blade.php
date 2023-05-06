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
                                <input type="text" value="{{Auth::guard('cus')->user()->fullname}}" class="form-control" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Email</label>
                                <input type="email" value="{{Auth::guard('cus')->user()->email}}" class="form-control" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Số điện thoại</label>
                                <input type="text" value="{{Auth::guard('cus')->user()->phone}}" class="form-control" placeholder="">
                            </div>
                            <div class="form-group ">
                                <label>Địa chỉ</label>
                                <textarea class="form-control" rows="3">{{Auth::guard('cus')->user()->address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div> <!-- container .//  -->
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th style="width:30px" class="text-center">#</th>
                            <th style="width:120px" class="text-center">Hình</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Đơn giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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
