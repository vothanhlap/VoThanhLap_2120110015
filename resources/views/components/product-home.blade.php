@foreach ($list_product as $item)
    @php
        $arr_image = $item->productimg;
        $image = 'hinh.png';
        if (count($arr_image) > 0) {
            $image = $arr_image[0]['image'];
            
        }
        $mo_ta = $item->name;
        $rut_gon = substr($mo_ta, 0, 100) . '...';
    @endphp
    <li class="col-6 col-lg-3 col-md-4">
        <a href="{{ route('frontend.slug', ['slug' => $item->slug]) }}" class="item product-card position-relative">
            <div class="row">
                <div class="col-md-9">
                    <p
                        class="mx-2 text-truncate">{{ $rut_gon }}</p>
                    <div class="card-body">
                        <span class="price">{{ number_format($item->price_buy, 0) }} VNĐ</span>
                    </div>
                </div>
                <div class="col-md-3 mt-5">
                    <img href="{{ route('frontend.slug', ['slug' => $item->slug]) }}" class=" img-sm float-right"
                        src="{{ asset('images/product/' . $image) }}" alt="{{ $image }}">
                </div>
                
            </div>
           
        </a>
    </li>
@endforeach
