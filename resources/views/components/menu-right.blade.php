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
      @endphp
        <div class="card-banner border-bottom">
            <div class="py-3" style="width:80%">
              <h6 class="card-title"><p style="text-overflow: ellipsis;">{{$product->name}}</p></h6>
              <a href="#" class="btn btn-secondary btn-sm mx-2">Xem ngay</a>
            </div> 
            <img height="80" class="img-bg" src="{{ asset('images/product/'.$image)}}" alt="{{$image}}">
          </div>
        @endforeach
    </aside>
</div> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- card-body.// -->