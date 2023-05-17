<div class="collapse navbar-collapse" id="main_nav">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @foreach ($list_menu as $rowmenu)
            <x-menu-item :menu="$rowmenu"/>
   @endforeach
  </ul>
  
  </div> <!-- collapse .// -->