@section('menuadmim')
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link text-danger" style="font-weight:700; font-size:18px;text-transform:uppercase"
                    data-slide="true" href="#" role="button">
                    <i class="fas fa-user-alt"></i>
                    {{ $user_name }}
                </a>
            </li>
            <li class="nav-item left">
                <a class="nav-link text-success" style="text-transform:uppercase" data-slide="true"
                    href="{{ route('logout') }}" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    Đăng Xuất
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ asset('Dashboall/Index') }}" class="brand-link">
            <img src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"> QUẢN LÝ SHOP </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('public/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ asset('Dashboall/Index" class="d-block') }}"> {{ $user_name }}</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-shoe-prints"></i>
                            <p style="color:yellow;">
                                Sản Phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('product.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Sản Phẩm </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Loại Sản Phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('brand.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Thương hiệu</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-mail-bulk" style="color:red"></i>
                            <p style="color:yellow;">
                                Bài Viết
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('topic.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Đề Tài </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('post.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Bài Viết</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('page.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Trang Đơn</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-accusoft" style="color:red;"></i>
                            <p style="color:yellow;">
                                Đơn Hàng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('order.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Đơn Hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('orderdetail.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Chi tiết đơn Hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-accusoft" style="color:red;"></i>
                            <p style="color:yellow;">
                                Quản lý Slider
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('slider.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Slider</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-accusoft" style="color:red;"></i>
                            <p style="color:yellow;">
                                Khác
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('contact.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Liên Hệ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('menu.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Danh Sách User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color:greenyellow">Khách hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Thông tin</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-user text-warning"></i>
                            <p>Hồ sơ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                            <p class="text">Đăng xuất</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    {{-- comment --}}
    @yield('content')
    <footer class="main-footer">
        <strong>Copyright &copy; 2020-2022</strong>
        Thiết kế bởi Võ Thành Lâp
        <div class="float-right d-none d-sm-inline-block">

        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection