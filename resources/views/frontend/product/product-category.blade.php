@extends('layouts.site')
@section('title', 'San pham theo loai')
@section('content')
    <!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">

    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Recommended items</h4>
    </header>
    
    <div class="row row-sm">
        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
            <div class="card card-sm card-product-grid">
                <a href="#" class="img-wrap"> <img src="images/items/1.jpg"> </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">Just another product name</a>
                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                </figcaption>
            </div>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    </section>
    <!-- =============== SECTION ITEMS .//END =============== -->
    
@endsection