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
        <a type="submit" href="{{route('giohang.dathangthanhcog')}}" class="btn btn-primary float-md-right">Đặt hàng</a>
        <a href="{{ route('frontend.home') }}" class="btn btn-light"> <i
                class="fa fa-chevron-left"></i>Tiếp tục mua sắm </a>
    </div>
    </section>
   
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection

  {{--     
            <div class="card mb-4">
          <div class="card-body">
          <h4 class="card-title mb-4">Payment</h4>
          <form role="form" style="max-width:380px;">
                <div class="form-group">
                <label for="username">Name on card</label>
                <input type="text" class="form-control" name="username" placeholder="Ex. John Smith" required="">
                </div> <!-- form-group.// -->
    
                <div class="form-group">
                <label for="cardNumber">Card number</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="cardNumber" placeholder="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp; 
                            <i class="fab fa-cc-mastercard"></i> 
                        </span>
                    </div>
                </div> <!-- input-group.// -->
                </div> <!-- form-group.// -->
    
                <div class="row">
                    <div class="col-md flex-grow-0">
                        <div class="form-group">
                            <label class="hidden-xs">Expiration</label>
                            <div class="form-inline" style="min-width: 220px">
                                <select class="form-control" style="width:100px">
                                    <option>MM</option>
                                    <option>01 - Janiary</option>
                                    <option>02 - February</option>
                                    <option>03 - February</option>
                                </select>
                                <span style="width:20px; text-align: center"> / </span>
                                <select class="form-control" style="width:100px">
                                    <option>YY</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label data-toggle="tooltip" title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                            <input class="form-control" required="" type="text">
                        </div> <!-- form-group.// -->
                    </div>
                </div> <!-- row.// -->
                <button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
            </form>
          </div> <!-- card-body.// -->
        </div> <!-- card .// --> --}}
