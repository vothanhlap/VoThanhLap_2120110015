<div class="container">
    <section class="footer-top padding-y-lg text-white">
        <div class="row">
            @foreach ($menu_footer as $footermenu)
               <x-footer-menu-item :menu="$footermenu" />
            @endforeach
            
        </div> <!-- row.// -->
    </section> <!-- footer-top.// -->  
</div><!-- //container -->
