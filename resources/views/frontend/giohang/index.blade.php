@extends('layouts.site')
@section('title', 'Gio hang')
@section('content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container" id="list-cart">
        <div class="row">
            <main class="col-md-9">
                <div class="card">
                    <table class="table table-bordered  ">
                        <thead class="text-muted">
                            <tr class="small ">
                                <th class="text-center" width="20">#</th>
                                <th class="text-center">TẤT CẢ SẢN PHẨM</th>
                                <th class="text-center" width="120"> ĐƠN GIÁ</th>
                                <th class="text-center" width="80">SỐ LƯỢNG</th>
                                <th class="text-center" width="120">THÀNH TIỀN</th>
                                <th class="text-center" width="150">CHỨC NĂNG</th>

                            </tr>
                        </thead>
                       
                        <tbody>
                            @if (Session::has("Cart")!= null)
                            @foreach (Session::get("Cart")->products as $item)
                            @php
                            $product_image= $item['image'];
                           $hinh="";
                           if(count($product_image)>0)
                           {
                               $hinh=$product_image[0]["image"];
                           } 
                       @endphp
                            <tr>
                                <td class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <figure class="itemside">
                                        <div class="aside"><img src="{{ asset('images/product/' . $hinh) }}" alt="{{$hinh}}" class="img-sm"></div>
                                        <figcaption class="info">
                                            <a href="#" class="title text-dark">{{$item['productinfo']->name}}</a>
                                            <p class="text-muted small">Màu: , <br> Thương hiệu: </p>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td class="text-center align-middle">
                                    {{number_format($item['productinfo']->price_buy)}}
                                </td>
                                <td class="text-center align-middle">
                                    <input class="form-control text-center" type="text" value="{{ $item['soluong'] }}">
                                </td>
                                <td class="text-center align-middle">
                                    <div class="price-wrap">
                                        <var class="price">{{ number_format($item['price'])}}</var>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a class="btn btn-light" onclick="deletelistCart({{$item['productinfo']->id}});">
                                        Xoá</a>
                                        <a class="btn btn-light" >
                                            Sửa</a>
                                </td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="card-body border-top">
                        <a href="{{ route('giohang.checkout') }}" class="btn btn-primary float-md-right"> Thanh toán <i
                                class="fa fa-chevron-right"></i> </a>
                        <a href="{{ route('frontend.home') }}" class="btn btn-light"> <i
                                class="fa fa-chevron-left"></i>Tiếp tục mua sắm </a>
                    </div>
                </div> <!-- card.// -->
                <div class="alert alert-success mt-3">
                    <p class="icontext"><i class="icon text-success fa fa-truck"></i> Giao hàng miễn phí trong vòng 1-2
                        tuần</p>
                </div>
            </main> <!-- col.// -->
            <aside class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Mã giảm giá?</label>
                                <div class="">
                                    <input type="text" class="form-control" name="" placeholder="Nhập mã code">
                                    <button class="btn btn-primary">Sử dụng</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- card-body.// -->
                </div> <!-- card .// -->
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt class="font-weight-bold">Tổng số lượng</dt>
                            <dd class="text-right ">
                                @if (Session::has("Cart")!= null)
                                {{Session::get("Cart")->tongsoluong}}
                                @else
                                0
                                @endif
                            </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt class="font-weight-bold">Giảm giá</dt>
                            <dd class="text-right ">
                                
                            </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt class="font-weight-bold">Tổng giá :</dt>
                            <dd class="text-right ">
                                @if (Session::has("Cart")!= null)
                                {{ number_format(Session::get("Cart")->tonggia, 0) }} VNĐ
                                @else
                                0,0 VNĐ
                                @endif

                            </dd>
                        </dl>
                    </div> <!-- card-body.// -->
                </div> <!-- card .// -->
            </aside> <!-- col.// -->
        </div>
    </div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection