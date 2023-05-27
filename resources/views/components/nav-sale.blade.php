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
            $rut_gon = substr($mo_ta, 0, 150) .'...';
            @endphp
            @php
                 $sale=$item->pricesale;
                
                 if(isset($price_sales)){
                    $price_sales = $sale->price_sale;
                 }
                 else{
                    $price_sales = 0;
                 }
            @endphp
            <div class="col-md col-6 " style="width:220px">
                <div class="card-group h-100" >
                    <div class="card ">
                      <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><img src="{{ asset('images/product/'.$image)}}"  style="height:150px;" class="card-img-top" alt="{{$image}}"></a>
                      <div class="card-body">
                        <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><p  class="card-title text-truncate  ">{{$rut_gon }}</p></a>
                        
                        <div class="row ">
                            <div class="col">
                                <p class="card-text">{{ number_format($item->price_buy,0) }}đ</p>
                            </div>
                            <div class="col">
                                <p class="card-text test">{{ $price_sales }}đ</p>
                            </div>
                        </div>
                        <a onclick="AddCart({{$item->id}})" href="javaCrip:"><button type="submit" class=" btn btn-sm mt-2 border border-warning" style="margin-left: 20px">Thêm vào giỏ hàng</button></a>
                      </div>
                    </div>
                </div>
                 
            </div> <!-- col.// -->
            @endforeach
        </div>
    </div>

</section>
<!-- =============== SECTION DEAL // END =============== -->