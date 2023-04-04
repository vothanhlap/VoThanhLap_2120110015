<div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav">
        @foreach ($list_menu as $rowmenu)
            <x-menu-item :menu="$rowmenu"/>
        @endforeach
    </ul>
    <ul class="navbar-nav ml-md-auto">
          <li class="nav-item">
          <a class="nav-link" href="#">Tải ứng dụng</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">English</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Russian</a>
          </div>
        </li>
     </ul>
  </div> <!-- collapse .// -->