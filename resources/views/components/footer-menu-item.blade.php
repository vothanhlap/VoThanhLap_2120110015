 @if ($sub == false)
 <aside class="col-md col-9">
    <h6 class="title">{{$menu->name}}</h6>
</aside>
 @else
 <aside class="col-md col-9">
    <h6 class="title">{{$menu->name}}</h6>
    <ul class="list-unstyled">
        @foreach ($list_menu_sub as $menu_sub)
          <li> <a href="{{ $menu_sub->link }}">{{ $menu_sub->name }}</a></li>
         @endforeach
    </ul>
</aside>
 @endif
 