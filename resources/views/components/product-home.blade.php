<div class="row row-cols-1 row-cols-md-3 ">
    @foreach ($product_home as $item)
    @php
    $arr_image=$item->productimg;
    $image = 'hinh.png';
    if(count($arr_image)>0)
    {
      $image=$arr_image[0]['image'];
    }
  @endphp
    <div class="col-md-3">
     <figure class="card card-product-grid">
         <div class="img-wrap mt-2"> 
             <span class="badge badge-danger"> NEW </span>
             <img width="40px" class="img-fluid mt-2 " src="{{ asset('images/product/'.$image)}}" alt="{{$image}}">
         </div> <!-- img-wrap.// -->
         <figcaption class="info-wrap">
                 <a href="#" class="title mb-2 text-center">{{$item->name}}</a>
                 <div class="price-wrap ">
                     
                     <div class="col-md-12 text-center">
                         <div class="row">
                             <div class="col-md-6">
                                 <span class="price text-danger"><p>{{ number_format($item->price_buy,0) }} VNĐ</p></span> 
                             </div>
                             <div class="col-md-6">
                                 
                             </div>
                         </div>
                     </div>
                 </div> <!-- price-wrap.// -->
                 
                 <span class="text-muted ">
                     <div class="text-center mt-3 mb-4">
                         <div class="row">
                             <div class="col-md-6">
                                 <a href="#" class="btn btn-outline-primary"> <i class="fas fa-eye"></i> Xem</a>
                             </div>
                             <div class="col">
                                 <a href="#" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                             </div>
                          </div>
                     </div>
                 </span>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="content">
                             <div class="progress mb-2" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="75">
                                 <div class="progress-bar " style="width: 75%">Còn lại:</div>
                               </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="content">
                             <div class="progress mb-2" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="75">
                                 <div class="progress-bar " style="width: 25%">Đã bán:</div>
                               </div>
                         </div>
                     </div>
                 </div>
         </figcaption>
     </figure>
 </div> <!-- col.// -->
    @endforeach
   </div>
</div>