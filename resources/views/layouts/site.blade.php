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
        0% {
            color: #ee1515;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #ee1515;
        }
    }

    @-moz-keyframes my {
        0% {
            color: #ee1515;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #ee1515;
        }
    }

    @-o-keyframes my {
        0% {
            color: #ee1515;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #ee1515;
        }
    }

    @keyframes my {
        0% {
            color: #ee1515;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #ee1515;
        }
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

    .zoom {
        height: 150px;    
        transition: transform .2s;
        /* Animation */
    }

    .zoom:hover {
        transform: scale(1.5);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
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
                                <input type="text" class="form-control" name="key" placeholder="Nhập từ khóa tìm kiếm">
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
                        <div class="widgets-wrap float-md-left mt-3 mr-3">
                            <a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                <div class=" mt-1 ">
                                    <i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    {{-- @if (Session::has('Cart') != null )
                                    <span id="total-quanty-show"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">
                                        {{ Session::get('Cart')->tongsoluong}} </span>
                                    @else
                                    <span id="total-quanty-show"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">
                                        0 </span>
                                    @endif --}}
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
                                                                <h3 class="product-name"><a href="#">{{ $rut_gon1 }}</a>
                                                                </h3>
                                                                <p class="product-price"><span class="qty">{{
                                                                        $item['soluong'] }}
                                                                        x</span>{{
                                                                    number_format($item['productinfo']->price_buy) }}
                                                                    VNĐ</p>
                                                            </td>
                                                            <td class="close-btn align-middle" style="width:40px">
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
                                                                    {{ number_format(Session::get('Cart')->tonggia, 0)
                                                                    }}
                                                                    VNĐ
                                                                </h6>
                                                                {{-- <input hidden id="total-quanty-cart" type="number"
                                                                    class="form-control" value="{{ Session::get("
                                                                    Cart")->tongsoluong }}"> --}}
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
    <x-main-menu />
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
                        <h5 class="text-warning">Thông tin về Shop</h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone" viewBox="0 0 16 16">
                            <path
                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg> Phone: +84 721 779 93. <br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg> Địa chỉ:305/2 QL13 - P.Hiệp Bình Phước.<br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-open" viewBox="0 0 16 16">
                            <path
                                d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882l-6-3.2ZM15 7.383l-4.778 2.867L15 13.117V7.383Zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2Z" />
                        </svg> Email: laptopvui80@gmail.com.
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
            }).done(function (response) {
                RenderCart(response);
                alertify.success('Thêm sản phẩm thành công');
            });
        }

        $("#change-item-cart").on("click", ".close-btn i", function () {
            $.ajax({
                url: 'deleteCart/' + $(this).data("id"),
                type: 'GET',
            }).done(function (response) {
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
    {{--
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>
@yield('footer')

</html>