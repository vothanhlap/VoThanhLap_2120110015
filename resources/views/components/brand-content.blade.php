<section class="padding-bottom">
    <ul class="row mt-4">
        @foreach ($list_brand as $brand)
            <li class="col-md col-6 mx-2"><a href="#" class="icontext"> <img style="width:150px" class="" src="{{ asset('images/brand/' . $brand->image) }}"
                alt="{{ $brand->image }}"></a>
            </li>
        @endforeach
    </ul>
</section>

