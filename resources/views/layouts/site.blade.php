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
<style>
/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}



.product-card{
  background-color: white;
  padding: 15px;
  border-radius: 10px;
  overflow: hidden;
}
.product-image img{
  width: 20px;
 
}
.product-card .product-image {
  height: 150px;
}
.product-card .product-image image{
  object-fit: contain;
}

.product-card .product-image>.last{
  display: none;
  
}
.product-card:hover .product-image>img:nth-child(1){
  display: none;

}
.product-card:hover .product-image>.last{
  display: block;
}
.description{
  font-size: 13px;
  color: var(--color-777777);
  margin-right: 20px;
}
.product-card:hover .action-bar{
  right: 15px;
}
.product-card .product-details h6{
 color: var(--color-bf4800);
 font-size: 13px;
}

.product-card .product-details h5{
  font-size: 15px;
  color: var(--color-1c1c1b);
}
.price{
  font-size: 16px;
  color: var(--color-1c1c1b);
}


.action-bar{
  top: 10%;
  right: -23px;
  transition: .3s;
}

.wishlist-icon{
  top: 4%;
  right: 15px;
}
</style>
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
                                <a href="{{route('login.dangnhap')}}" class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <small class="text">Đăng nhập</small>
                                </a>
                            </div>
                            <div class="widgets-wrap float-md-right">
                                <div class="widget-header mr-3">
                                    <a href="{{route('login.dangki')}}" class="widget-view">
                                        <div class="icon-area">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <small class="text">Đăng ký</small>
                                    </a>
                                </div>
                            <div class="widget-header mr-3">
                                <a href="#" class="widget-view">
                                    <div class="icon-area">
                                        <i class="fa fa-comment-dots"></i>
                                    </div>
                                    <small class="text">Đăng xuất</small>
                                </a>
                            </div>
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
        @yield('content')
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
