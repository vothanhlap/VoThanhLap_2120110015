<div class="col-md d-none d-lg-block flex-grow-1">
    <aside class="special-home-right">
        <h6 class="bg-blue text-center text-white mb-0 p-2">SẢN PHẨM PHỔ BIẾN </h6>
        @foreach ($list_product as $product)
        @php
        $arr_image=$product->productimg;
        $image = 'hinh.png';
        if(count($arr_image)>0)
        {
          $image=$arr_image[0]['image'];
        }
        $mo_ta = $product->name;
        $rut_gon1 = substr($mo_ta, 0, 100) .'...';
      @endphp
        <div class="card-banner border-bottom">
            <div class="py-2" style="width:90%">
              <p class="card-title mb-2" >{{ $rut_gon1}}</p>
              <a href="{{route('frontend.slug',['slug'=>$product->slug])}}" class="btn btn-secondary btn-sm mx-2">Xem ngay</a>
            </div> 
            <a href="{{route('frontend.slug',['slug'=>$product->slug])}}"><img height="60" width="80" class="mb-2 img-bg" src="{{ asset('images/product/'.$image)}}" alt="{{$image}}"></a>
          </div>
        @endforeach
    </aside>
</div> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- card-body.// -->