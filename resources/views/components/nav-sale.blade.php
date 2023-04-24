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
            $mo_ta = $item->name;
            $rut_gon = substr($mo_ta, 0, 100) .'...';
            @endphp
            <div class="col-md col-6 w-100">
                <figure class="card-product-grid card-sm"   >
                    <a href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="img-wrap">
                        <img style="height:150px;" class="img-fluid" src="{{ asset('images/product/'.$image)}}" alt="{{$image}}">                    </a>
                    <div class="text-wrap p-3">
                        <a href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="title">{{$rut_gon}}</a>
                        <span class="badge badge-danger"> -20% </span>
                    </div>
                    <div>
                        {{-- <div class="overlays"></div> --}}
                        <div class="servece-desc">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><i class="far fa-eye"></i></a>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <a onclick="AddCart({{$item->id}})" href="javaCrip:"><i class="fa fa-shopping-cart"></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                     </div>
                </figure>
                 
            </div> <!-- col.// -->
            @endforeach
        </div>
    </div>

</section>
<!-- =============== SECTION DEAL // END =============== -->