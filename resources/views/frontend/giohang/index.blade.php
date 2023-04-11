@extends('layouts.site')
@section('title', 'Gio hang')
@section('content')
     <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">
    
    <div class="row">
        <main class="col-md-9">
    <div class="card">
    
    <table class="table table-borderless table-shopping-cart">
    <thead class="text-muted">
    <tr class="small text-uppercase">
      <th scope="col">TẤT CẢ SẢN PHẨM</th>
      <th scope="col" width="120">SỐ LƯỢNG</th>
      <th scope="col" width="120">GIÁ</th>
      <th scope="col" class="text-right" width="200"> </th>
    </tr>
    </thead>
    <tbody>
        {{-- @php
            $tong = 0
        @endphp
        @if (session('cart'))
           @foreach (session('cart') as $id => $detail)
           @php
               $tong += $detail['price']* $detail['soluong']
           @endphp --}}
                 <tr >
                    <td >
                        <figure class="itemside">
                            <div class="aside"><img src="images/items/1.jpg" class="img-sm"></div>
                            <figcaption class="info">
                                <a href="#" class="title text-dark">///</a>
                                <p class="text-muted small">Size: XL, Color: blue, <br> Brand: Gucci</p>
                            </figcaption>
                        </figure>
                    </td>
                    <td> 
                        <select class="form-control">
                            <option></option>
                        </select> 
                    </td>
                    <td> 
                        <div class="price-wrap"> 
                            <var class="price"></var> 
                            <small class="text-muted"> $315.20 each </small> 
                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="text-right"> 
                    <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                    <a href="" class="btn btn-light"> Xóa</a>
                    </td>
                </tr> 
           {{-- @endforeach
        @endif   --}}
    </tbody>
    </table>
    
    <div class="card-body border-top">
        <a href="#" class="btn btn-primary float-md-right"> Thanh toán <i class="fa fa-chevron-right"></i> </a>
        <a href="{{route('frontend.home')}}" class="btn btn-light"> <i class="fa fa-chevron-left"></i>Tiếp tục mua sắm </a>
    </div>	
    </div> <!-- card.// -->
    
    <div class="alert alert-success mt-3">
        <p class="icontext"><i class="icon text-success fa fa-truck"></i> Giao hàng miễn phí trong vòng 1-2 tuần</p>
    </div>
    
        </main> <!-- col.// -->
        <aside class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Mã giảm giá?</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="" placeholder="Nhập mã code">
                            <span class="input-group-append"> 
                                <button class="btn btn-primary">Sử dụng</button>
                            </span>
                        </div>
                    </div>
                </form>
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
            <div class="card">
                <div class="card-body">
                        <dl class="dlist-align">
                          <dt>Tổng giá :</dt>
                          <dd class="text-right"></dd>
                        </dl>
                        <dl class="dlist-align">
                          <dt>Giam giá:</dt>
                          <dd class="text-right">USD 658</dd>
                        </dl>
                        <dl class="dlist-align">
                          <dt>Tổng cộng:</dt>
                          <dd class="text-right  h5"><strong>$1,650</strong></dd>
                        </dl>                
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
        </aside> <!-- col.// -->
    </div>
    
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
