<!-- =============== SECTION DEAL =============== -->
<section class="padding-bottom">
    <div class="card card-deal">
        <div class="col-heading content-body">
            <header class="section-heading">
                <h3 class="section-title">KHUYẾN MÃI SỐC</h3>
                <p>Ưu đãi và ưu đãi</p>
            </header><!-- sect-heading -->
            <div class="timer">
                <div> <span class="num">04</span> <small>Ngày</small></div>
                <div> <span class="num">12</span> <small>Giờ</small></div>
                <div> <span class="num">58</span> <small>Phút</small></div>
                <div> <span class="num">02</span> <small>Giây</small></div>
            </div>
        </div> <!-- col.// -->
        <div class="row no-gutters items-wrap">
            @foreach ($list_product as $item)
            @php
            $arr_image=$item->productimg;
            $image = 'hinh.png';
            if(count($arr_image)>0)
            {
              $image=$arr_image[0]['image'];
            }
            @endphp
            <div class="col-md col-6">
                <figure class="card-product-grid card-sm">
                    <a href="#" class="img-wrap">
                        <img height="80" src="{{ asset('images/product/'.$image)}}" alt="{{$image}}">                    </a>
                    <div class="text-wrap p-3">
                        <a href="#" class="title">{{$item->name}}</a>
                        <span class="badge badge-danger"> -20% </span>
                    </div>
                </figure>
            </div> <!-- col.// -->
            @endforeach
        </div>
    </div>

</section>
<!-- =============== SECTION DEAL // END =============== -->