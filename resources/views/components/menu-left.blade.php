<aside class="col-lg col-md-3 flex-lg-grow-0">
    <h6>DANH MỤC SẢN PHẨM</h6>
    <nav class="nav-home-aside">
        <ul class="menu-category">
            @foreach ($list_category as $item)          
            <li><a href="{{route('frontend.slug',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
    </nav>
</aside> <!-- col.// -->