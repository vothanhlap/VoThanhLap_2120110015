@foreach ($list_product as $item)
@php
$arr_image=$item->productimg;
$image = 'hinh.png';
if(count($arr_image)>0)
{
  $image=$arr_image[0]['image'];
}
@endphp
<li class="col-6 col-lg-3 col-md-4">
    <a href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="item product-card position-relative"> 
        <div class="row">
            <div class="col-md-9">
                <div class="card-body">
                    <h6 class="title">{{$item->name}}</h6>
                    <span class="price "><p>{{ number_format($item->price_buy,0) }} VNĐ</p></span> 
                    <span class="price text-danger"><p>{{ number_format($item->price_sale,0) }} VNĐ</p></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex justify-content-end">
                    <button class="border-0 bg-transparent">
                        <svg class="icon icon-cmheart not-added" id="Capa_1" width="16px" height="16px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 471.701 471.701" style="enable-background:new 0 0 471.701 471.701;" xml:space="preserve">
                            <g>
                                <path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
                                    c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
                                    l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
                                    C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
                                    s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
                                    c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
                                    C444.801,187.101,434.001,213.101,414.401,232.701z"></path>
                            </g>
                            </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-end mt-4">
                <img href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="img-sm float-right" src="{{ asset('images/product/'.$image)}}" alt="{{$image}}"> 
               </div>
            </div>
        </div>
        <div class="product-details">
            <samp class="brand mx-4">Thương hiệu:{{$item->braname}}</samp>
          </div>
    </a>
        </li>
@endforeach
{{-- <span class="badge badge-danger"> NEW </span> --}}
