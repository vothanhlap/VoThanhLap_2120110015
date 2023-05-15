<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- jQuery -->
    <script src="{{ asset('public/frontend/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap4 files-->
    <script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('public/frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font awesome 5 -->
    {{--
    <link href="{{ asset('public/frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet"> --}}
    <!-- custom style -->
    <link href="{{ asset('public/frontend/css/ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom javascript -->
    <script src="{{ asset('public/frontend/js/script.js" type="text/javascript') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/styte.css') }}">
</head>
@yield('header')
<style>
@-webkit-keyframes my {
	 0% { color: #ee1515; } 
	 50% { color: #fff;  } 
	 100% { color: #ee1515;  } 
 }
 @-moz-keyframes my { 
	 0% { color: #ee1515;  } 
	 50% { color: #fff;  }
	 100% { color: #ee1515;  } 
 }
 @-o-keyframes my { 
	 0% { color: #ee1515; } 
	 50% { color: #fff; } 
	 100% { color: #ee1515;  } 
 }
 @keyframes my { 
	 0% { color: #ee1515;  } 
	 50% { color: #fff;  }
	 100% { color: #ee1515;  } 
 } 
 .test {   
	 -webkit-animation: my 700ms infinite;
	 -moz-animation: my 700ms infinite; 
	 -o-animation: my 700ms infinite; 
	 animation: my 700ms infinite;
}
    .product-name {
        text-transform: capitalize;
        font-size: 18px;
    }
    .product-name>a {
        font-weight: 700;
    }

    .product-name>a:hover,
    .product-name>a:focus {
        color: #e554a9;
    }

    .product-price {
        color: #0ae23c;
        font-size: 15px;
    }

    .product-price .qty {
        font-weight: 400;
        margin-right: 20px;
    }

    .product-price .product-old-price {
        font-size: 70%;
        font-weight: 400;
        color: #8D99AE;
    }

    .delete {
        position: absolute;
        top: 0;
        left: 0;
        height: 14px;
        width: 14px;
        text-align: center;
        font-size: 10px;
        padding: 0;
        background: #1e1f29;
        border: none;
        color: #FFF;
    }

    .cart-summary {
        float: right;
    }

    .overlays {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        border-radius: 7px;
        cursor: pointer;
        background: linear-gradient(rgba(219, 211, 211, 0.5), #ace9e3);
        opacity: 0;
        transition: 1s;
    }

    .card-product-grid:hover .overlays {
        opacity: 1;
    }

    .servece-desc {
        width: 80%;
        position: absolute;
        bottom: 0;
        left: 50%;
        opacity: 0;
        transform: translateX(-50%);
        transition: 1s;

    }

    .servece-desc p {
        font-size: 14px;
    }

    .card-product-grid:hover .servece-desc {
        bottom: 30%;
        opacity: 1;
    }

    /* home product */
    .over {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        border-radius: 7px;
        cursor: pointer;
        background: linear-gradient(rgba(219, 211, 211, 0.5), #ace9e3);
        opacity: 0;
        transition: 1s;
    }

    .over:hover {
        opacity: 1;
    }

    .box-scroll {
        width: 300px;
        height: 350px;
        overflow-y: auto;
        padding: 0px 10px;
    }
</style>

<body>
    <header class="section-header">
        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-md-12">
                        <a href="{{ route('frontend.home') }}" class="brand-wrap">
                            <img style="width: 120px" class="logo" src="{{ asset('public/images/logo.png') }}">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <form action="{{ route('frontend.timkiem') }}" class="search-header" method="get">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" name="key"
                                    placeholder="Nhập từ khóa tìm kiếm">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i> Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="widgets-wrap float-md-left mt-2 mx-4">
                            <div class="widget-header ">
                                <ul class="navbar-nav ">                      
                                    @if(Auth::guard('customer')->check())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                class="fa fa-user"></i> {{Auth('customer')->user()->fullname}} </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('login.dangxuat') }}">
                                                Đăng xuất
                                            </a>
                                        </div>
                                    </li> 
                                    @else
                                     <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                class="fa fa-user"></i> Tài khoản </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('login.dangnhap') }}">
                                                Đăng nhập
                                            </a>
                                            <a class="dropdown-item" href="{{route('login.dangki')}}">
                                                Đăng ký
                                            </a>
                                        </div>
                                    </li> 
                                    @endif
                                     
                                </ul>
                            </div>
                        </div>
                        @php
                            $tt = 0;
                            if (Session::has('Cart') != null) {
                                $tt = Session::get('Cart')->tongsoluong;
                            }
                        @endphp
                        <div class="widgets-wrap float-md-left mt-3 mr-3">
                            <a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                <div class=" mt-1 ">
                                    <i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    @if ($tt != null)
                                        <span id="total-quanty-show"
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">
                                            {{ $tt }}
                                        @else
                                            <span id="total-quanty-show"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">
                                                {{ $tt }}
                                    @endif
                                </div>
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <h5 class="modal-title" id="exampleModalLabel">GIỎ HÀNG</h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="change-item-cart">
                                            @if (Session::has('Cart') != null)
                                                <div class="modal-body">
                                                    <table class="table table-bordered ">
                                                        <tbody>
                                                            @foreach (Session::get('Cart')->products as $item)
                                                                @php
                                                                    $mo_ta = $item['productinfo']->name;
                                                                    $rut_gon1 = substr($mo_ta, 0, 100) . '...';
                                                                    
                                                                    $product_image = $item['image'];
                                                                    $hinh = '';
                                                                    if (count($product_image) > 0) {
                                                                        $hinh = $product_image[0]['image'];
                                                                    }
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        <img style="width:80px"
                                                                            src="{{ asset('images/product/' . $hinh) }}"
                                                                            alt="{{ $hinh }}">
                                                                    </td>
                                                                    <td>
                                                                        <h3 class="product-name"><a
                                                                                href="#">{{ $rut_gon1 }}</a>
                                                                        </h3>
                                                                        <p class="product-price"><span
                                                                                class="qty">{{ $item['soluong'] }}
                                                                                x</span>{{ number_format($item['productinfo']->price_buy) }}
                                                                            VNĐ</p>
                                                                    </td>
                                                                    <td class="close-btn align-middle"
                                                                        style="width:40px">
                                                                        <i class="fa fa-close"
                                                                            data-id="{{ $item['productinfo']->id }}"></i>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th class="align-middle text-danger">
                                                                    <h6>
                                                                        Tổng
                                                                    </h6>
                                                                </th>
                                                                <th>
                                                                    <h6>
                                                                        {{ number_format(Session::get('Cart')->tonggia, 0) }}
                                                                        VNĐ
                                                                    </h6>
                                                                    {{-- <small>{{ Session::get("Cart")->tongsoluong }} sản
                                                                    phẩm</small> --}}
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            @else
                                                <p class="text-center">Không có sản phẩm trong giỏ hàng</p>
                                            @endif

                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-primary" href="{{ route('giohang.index') }}">Xem giỏ
                                                hàng</a>
                                            <a class="btn btn-primary float-md-right" id="info_confirm"
                                                href="{{ route('giohang.checkout') }}"> Thanh toán <i
                                                    class="fa fa-chevron-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container.// -->
        </section> <!-- header-main .// -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <x-main-menu />
            </div>
        </nav>
    </header> <!-- section-header.// -->
    <div class="container">
        @yield('content')
    </div>
    <!-- container end.// -->
    <!-- ========================= SECTION SUBSCRIBE  ========================= -->
    <section class="section-subscribe padding-y-lg">
        <div class="container">

            <p class="pb-2 text-center text-white">
                Cung cấp các xu hướng sản phẩm mới nhất và tin tức ngành trực tiếp
                cho bạn</p>
            <div class="row justify-content-md-center">
                <div class="col-lg-5 col-md-6">
                    <form class="form-row">
                        <div class="col-md-8 col-7">
                            <input class="form-control border-0" placeholder="Nhập Email của bạn" type="email">
                        </div> <!-- col.// -->
                        <div class="col-md-4 col-5">
                            <button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i>
                                Phản hồi </button>
                        </div> <!-- col.// -->
                    </form>
                    <small class="form-text text-white-50">Chúng tôi sẽ không bao giờ chia sẻ địa chỉ email của bạn với
                        bên thứ ba. </small>
                </div> <!-- col-md-6.// -->
            </div>
        </div>
    </section>
    <!-- ========================= SECTION SUBSCRIBE END// ========================= -->
    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-top padding-y-lg text-white">
                        <h5>Thông tin về Shop</h5>

                    </div>
                </div>
                <div class="col-md-9">
                    <x-footer-menu />
                </div>
            </div>
        </div>
        <section class="footer-bottom text-center">
            <p class="text-white">Trang web chủ sở hữu Laptopvui.net</p>
            <p class="text-muted"> &copy 2023 Võ Thành Lập, All rights reserved </p>
            <br>
        </section>
    </footer>
    <!-- ========================= FOOTER END // ========================= -->
    <script>
        function AddCart(id) {
            $.ajax({
                url: 'addcart/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Thêm sản phẩm thành công');
            });
        }

        $("#change-item-cart").on("click", ".close-btn i", function() {
            $.ajax({
                url: 'deleteCart/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Xóa sản phẩm thành công');
            });
        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty-cart").val());

        }
    </script>
    <script>
        function deletelistCart(id) {
            $.ajax({
                url: 'delete-list-Cart/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                alertify.success('Xóa sản phẩm thành công');
            });
        }

        function RenderListCart(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);

        }
    </script>
     <script>
           $(document).ready(function(){
            $('#info_confirm').click(function(e){
                e.prevenDefault();
                alertify.success('Thêm sản phẩm thành công')
            });
        });
     </script>
   
    
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

</body>
@yield('footer')


</html>
