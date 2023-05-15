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
                                <input type="text" value="{{Auth::guard('customer')->user()->fullname}}" class="form-control" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Email</label>
                                <input type="email" value="{{Auth::guard('customer')->user()->email}}" class="form-control" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Số điện thoại</label>
                                <input type="text" value="{{Auth::guard('customer')->user()->phone}}" class="form-control" placeholder="">
                            </div>
                            <div class="form-group ">
                                <label>Địa chỉ</label>
                                <textarea class="form-control" rows="3">{{Auth::guard('customer')->user()->address}}</textarea>
                            </div>
                            
                        </div>
                    </div>
                </div> <!-- container .//  -->
            </div>
            <div class="col-md-6">
               <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:10px" class="text-center">#</th>
                        <th style="width:70px" class="text-center">Hình</th>
                        <th  class="text-center">Tên sản phẩm</th>
                        <th style="width:30px" class="text-center">SL</th>
                        <th style="width:50px" class="text-center">Đơn giá</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach (Session::get("Cart")->products as $item)
                    @php
                         $mo_ta = $item['productinfo']->name;
                        $rut_gon1 = substr($mo_ta, 0, 100) . '...';

                        $product_image= $item['image'];
                        $hinh="";
                        if(count($product_image)>0)
                        {
                            $hinh=$product_image[0]["image"];
                        } 
                    @endphp
                    <tr>
                        <td class="text-center align-middle"><input type="checkbox"></td>
                        <td class="text-center align-middle"> <img style="width:80px" src="{{ asset('images/product/' . $hinh) }}" alt="{{$hinh}}"></td>
                        <td class=" align-middle" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{$item['productinfo']->name}}</td>
                        <td class=" align-middle">{{ $item['soluong'] }}</td>
                        <td class=" align-middle">{{ number_format($item['productinfo']->price_buy) }}</td>

                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <td>Tổng tiền</td>
                            <td>{{ number_format(Session::get("Cart")->tonggia, 0) }}</td>
                        </th>
                    </tr>
                </tfoot>
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
