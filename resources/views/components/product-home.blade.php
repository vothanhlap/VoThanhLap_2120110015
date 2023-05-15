<section  class="padding-bottom-sm">
    <div class="container">
       <div class="row row-sm mt-4">
         @foreach ($list_product as $item)
           @php
           $arr_image=$item->productimg;
           $image = 'hinh.png';
           if(count($arr_image)>0)
           {
           $image=$arr_image[0]['image'];
           }
           @endphp
         <div class="col-md-2 text-center">
           <div class="card card-product-grid" style="height: 250px">
                <img style="height: 150px;" class="img-fluid" src="{{ asset('images/product/'.$image)}}">
               <figcaption class="info-wrap">
                   <a href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="title text-truncate">{{$item->name}}</a>
                   <div class="price mt-1">
                       {{ number_format($item->price_buy,0) }} VNĐ
                   </div> <!-- price-wrap.// -->
                   <div>
                    <a onclick="AddCart({{$item->id}})" href="javaCrip:"><button type="submit" class=" btn btn-sm border border-warning mt-2">Thêm vào giỏ hàng</button></a>
                      
                    </div>
               </figcaption>
               
           </div>
           
       </div> <!-- col.// -->
         @endforeach
       </div> <!-- row.// -->
    </div>
   </section>