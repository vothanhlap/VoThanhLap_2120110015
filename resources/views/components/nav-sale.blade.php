<!-- =============== SECTION DEAL =============== -->
<section class="padding-bottom">
    <div class="card card-deal">
       @includeIf('layouts.sale')
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
            <div class="col-md col-6 w-50">
                <figure class="card-product-grid card-sm ">
                    <a href="#" class="img-wrap">
                        <img src="{{ asset('images/product/'.$image)}}" alt="{{$image}}">                    </a>
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