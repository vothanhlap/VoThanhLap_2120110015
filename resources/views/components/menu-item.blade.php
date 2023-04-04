@if ($sub == false)
<li class="nav-item">
   <a class="nav-link" href="{{$menu->link}}">{{$menu->name}}</a>
   </li>
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ $menu->link }}">{{ $menu->name }}</a>
        <div class="dropdown-menu dropdown-large">
            <nav class="row">
                <div class="col mx-4">
                    @foreach ($list_menu_sub as $menu_sub)
                        <a href="{{ $menu_sub->link }}">{{ $menu_sub->name }}</a>
                    @endforeach
                </div>
            </nav> <!--  row end .// -->
        </div> <!--  dropdown-menu dropdown-large end.// -->
    </li>

@endif
