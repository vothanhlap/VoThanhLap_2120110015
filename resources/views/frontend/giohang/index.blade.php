@extends('layouts.site')
@section('title', 'Gio hang')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
        <div class="container">
            <div class="row" >
                    <main class="col-md-9">
                        <div class="card" id="list-cart" >
                           
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
                                        <input type="text" class="form-control" name=""
                                            placeholder="Nhập mã code">
                                            <button class="btn btn-primary">Sử dụng</button>
                                    </div>       
                                </div>
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->
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
                                <dd class="text-right  h5"><strong></strong></dd>
                            </dl>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->
                </aside> <!-- col.// -->
            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
