  <div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav">
        @foreach ($list_menu as $menu)
        <li class="nav-item ">
            <a class="nav-link " data-toggle="dropdown" href="{{$menu->link}}"> <i class="fa fa-bars text-muted mr-2"></i> {{$menu->name}} </a>
          </li>
        @endforeach
    </ul>
    <ul class="navbar-nav ml-md-auto">
          <li class="nav-item">
          <a class="nav-link" href="#">Get the app</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" data-toggle="dropdown">English</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Russian</a>
            <a class="dropdown-item" href="#">French</a>
            <a class="dropdown-item" href="#">Spanish</a>
            <a class="dropdown-item" href="#">Chinese</a>
          </div>
        </li>
     </ul>
  </div> <!-- collapse .// -->