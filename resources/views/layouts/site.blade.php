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
    <link href="{{ asset('public/frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">
    <!-- custom style -->
    <link href="{{ asset('public/frontend/css/ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- custom javascript -->
    <script src="{{ asset('public/frontend/js/script.js" type="text/javascript') }}"></script>

</head>
@yield('header')

<body>

    <header class="section-header">
        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-md-12">
                        <a href="#" class="brand-wrap">
                            <img style="width: 120px" class="logo" src="{{ asset('public/images/logo.png') }}">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <form action="#" class="search-header">
                            <div class="input-group w-100">
                                <select class="custom-select border-right" name="category_name">
                                    <option value="">All type</option>
                                    <option value="codex">Special</option>
                                    <option value="comments">Only best</option>
                                    <option value="content">Latest</option>
                                </select>
                                <input type="text" class="form-control" placeholder="Search">

                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header mr-3">
                                <a href="#" class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <small class="text">Khách hàng</small>
                                </a>
                            </div>
                            <div class="widget-header mr-3">
                                <a href="#" class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-comment-dots"></i>
                                        <span class="notify">1</span>
                                    </div>
                                    <small class="text">Trò chuyện</small>
                                </a>
                            </div>
                            {{-- <div class="widget-header mr-3">
						<a href="#" class="widget-view">
							<div class="icon-area">
								
								<i class="fa fa-store"></i>
							</div>
							<small class="text"> Orders </small>
						</a>
					</div> --}}
                            <div class="widget-header">
                                <a href="#" class="widget-view">
                                    <div class="icon-area">
                                        <span class="notify">3</span>
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <small class="text">Giỏ hàng</small>
                                </a>
                            </div>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->

        <nav class="navbar navbar-main navbar-expand-lg border-bottom">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <x-main-menu />
            </div> <!-- container .// -->
        </nav>
    </header> <!-- section-header.// -->


    <div class="container">
        <!-- ========================= SECTION MAIN  ========================= -->
        <section class="section-main padding-y">
            <main class="card">
                <div class="card-body">

                    <div class="row">
                        <x-menu-left />
                        <div class="col-md-9 col-xl-7 col-lg-7">

                            <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
                            <x-slide-show />
                            <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->

                        </div> <!-- col.// -->
                        <x-menu-right />
                    </div> <!-- row.// -->

                </div> <!-- card-body.// -->
            </main> <!-- card.// -->

        </section>
        <!-- ========================= SECTION MAIN END// ========================= -->
        <!-- =============== SECTION DEAL =============== -->
        <section class="padding-bottom">
            <div class="card card-deal">
                <div class="col-heading content-body">
                    <header class="section-heading">
                        <h3 class="section-title">KHUYẾN MÃI SỐC</h3>
                        <p>Ưu đãi và ưu đãi</p>
                    </header><!-- sect-heading -->
                    <div class="timer">
                        <div> <span class="num">04</span> <small>Ngày</small></div>
                        <div> <span class="num">12</span> <small>Giờ</small></div>
                        <div> <span class="num">58</span> <small>Phút</small></div>
                        <div> <span class="num">02</span> <small>Giây</small></div>
                    </div>
                </div> <!-- col.// -->
                <div class="row no-gutters items-wrap">
                    <div class="col-md col-6">
                        <figure class="card-product-grid card-sm">
                            <a href="#" class="img-wrap">
                                <img src="{{ asset('public/frontend/images/items/3.jpg') }}">
                            </a>
                            <div class="text-wrap p-3">
                                <a href="#" class="title">Summer clothes</a>
                                <span class="badge badge-danger"> -20% </span>
                            </div>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-md col-6">
                        <figure class="card-product-grid card-sm">
                            <a href="#" class="img-wrap">
                                <img src="{{ asset('public/frontend/images/items/4.jpg') }}">
                            </a>
                            <div class="text-wrap p-3">
                                <a href="#" class="title">Some category</a>
                                <span class="badge badge-danger"> -5% </span>
                            </div>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-md col-6">
                        <figure class="card-product-grid card-sm">
                            <a href="#" class="img-wrap">
                                <img src="{{ asset('public/frontend/images/items/5.jpg') }}">
                            </a>
                            <div class="text-wrap p-3">
                                <a href="#" class="title">Another category</a>
                                <span class="badge badge-danger"> -20% </span>
                            </div>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-md col-6">
                        <figure class="card-product-grid card-sm">
                            <a href="#" class="img-wrap">
                                <img src="{{ asset('public/frontend/images/items/6.jpg') }}">
                            </a>
                            <div class="text-wrap p-3">
                                <a href="#" class="title">Home apparel</a>
                                <span class="badge badge-danger"> -15% </span>
                            </div>
                        </figure>
                    </div> <!-- col.// -->
                    <div class="col-md col-6">
                        <figure class="card-product-grid card-sm">
                            <a href="#" class="img-wrap">
                                <img src="{{ asset('public/frontend/images/items/7.jpg') }}">
                            </a>
                            <div class="text-wrap p-3">
                                <a href="#" class="title text-truncate">Smart watches</a>
                                <span class="badge badge-danger"> -10% </span>
                            </div>
                        </figure>
                    </div> <!-- col.// -->
                </div>
            </div>

        </section>
        <!-- =============== SECTION DEAL // END =============== -->

        @yield('content')

        <!-- =============== SECTION REGION =============== -->
        <section class="padding-bottom">

            <header class="section-heading heading-line">
                <h4 class="title-section text-uppercase">CHỌN KHU VỰC</h4>
            </header>

            <ul class="row mt-4">
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/CN.png') }}"> <span>China</span> </a>
                </li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/DE.png') }}"> <span>Germany</span> </a>
                </li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/AU.png') }}"> <span>Australia</span>
                    </a></li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/RU.png') }}"> <span>Russia</span> </a>
                </li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/IN.png') }}"> <span>India</span> </a>
                </li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/GB.png') }}"> <span>England</span> </a>
                </li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/TR.png') }}"> <span>Turkey</span> </a>
                </li>
                <li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm"
                            src="{{ asset('public/frontend/images/icons/flags/UZ.png') }}"> <span>Uzbekistan</span>
                    </a></li>
            </ul>
        </section>
        <!-- =============== SECTION REGION .//END =============== -->

        <article class="my-4">
            <img src="{{ asset('public/frontend/images/banners/ad-sm.png') }}" class="w-100">
        </article>
    </div>
    <!-- container end.// -->

    <!-- ========================= SECTION SUBSCRIBE  ========================= -->
    <section class="section-subscribe padding-y-lg">
        <div class="container">

            <p class="pb-2 text-center text-white">Cung cấp các xu hướng sản phẩm mới nhất và tin tức ngành trực tiếp
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
            <section class="footer-top padding-y-lg text-white">
                <div class="row">
                    <aside class="col-md col-6">
                        <h6 class="title">Brands</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Adidas</a></li>
                            <li> <a href="#">Puma</a></li>
                            <li> <a href="#">Reebok</a></li>
                            <li> <a href="#">Nike</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Company</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">About us</a></li>
                            <li> <a href="#">Career</a></li>
                            <li> <a href="#">Find a store</a></li>
                            <li> <a href="#">Rules and terms</a></li>
                            <li> <a href="#">Sitemap</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Help</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Contact us</a></li>
                            <li> <a href="#">Money refund</a></li>
                            <li> <a href="#">Order status</a></li>
                            <li> <a href="#">Shipping info</a></li>
                            <li> <a href="#">Open dispute</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Account</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#"> User Login </a></li>
                            <li> <a href="#"> User register </a></li>
                            <li> <a href="#"> Account Setting </a></li>
                            <li> <a href="#"> My Orders </a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Social</h6>
                        <ul class="list-unstyled">
                            <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
                            <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
                            <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
                            <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
                        </ul>
                    </aside>
                </div> <!-- row.// -->
            </section> <!-- footer-top.// -->

            <section class="footer-bottom text-center">

                <p class="text-white">Trang web chủ sở hữu Laptopvui.net</p>
                <p class="text-muted"> &copy 2023 Võ Thành Lập, All rights reserved </p>
                <br>
            </section>
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->
</body>
@yield('footer')

</html>
