<aside class="col-lg col-md-3 flex-lg-grow-0">
    <h6>DANH MỤC SẢN PHẨM</h6>
    <nav class="nav-home-aside">
        <ul class="menu-category">
            @foreach ($list_category as $item)
            <li><a href="#">{{$item->name}}</a></li>
            @endforeach
           
            {{-- <li class="has-submenu"><a href="#">More items</a>
                <ul class="submenu">
                    <li><a href="#">Submenu name</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
</aside> <!-- col.// -->