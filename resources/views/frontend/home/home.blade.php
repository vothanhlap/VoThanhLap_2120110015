@extends('layouts.site')
@section('title', 'Trang chu')
@section('content')
 <!-- ========================= SECTION MAIN  ========================= -->
 <section class="section-main padding-y">
    <main class="card">
        <div class="card-body">

            <div class="row">
                <x-menu-left />
                <div class="col-md-9 col-xl-7 col-lg-7">

                    <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
                    <x-slide-show />
                    <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->

                </div> <!-- col.// -->
                <x-menu-right />
            </div> <!-- row.// -->

        </div> <!-- card-body.// -->
    </main> <!-- card.// -->

</section>
<!-- ========================= SECTION MAIN END// ========================= -->
  <x-nav-sale/>
  <!-- =============== SECTION 1 =============== -->
<section class="padding-bottom">
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Apparel</h4>
    </header>
    
    <div class="card card-home-category">
    <div class="row no-gutters">
        <div class="col-md-3">
        <div class="home-category-banner bg-light-orange">
            <h5 class="title">Best trending clothes only for summer</h5>
            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
            <img src="{{asset('public/frontend/images/items/2.jpg')}}" class="img-bg">
        </div>
    
        </div> <!-- col.// -->
        <div class="col-md-9">
    <ul class="row no-gutters bordered-cols">
        <li class="col-6 col-lg-3 col-md-4">
    <a href="#" class="item"> 
        <div class="card-body">
            <h6 class="title">Well made women clothes with trending collection  </h6>
            <img class="img-sm float-right" src="{{asset('public/frontend/images/items/1.jpg')}}"> 
            <p class="text-muted"><i class="fa fa-map-marker-alt"></i> Guanjou, China</p>
        </div>
    </a>
        </li>
    </ul>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    </div> <!-- card.// -->
    </section>
    <!-- =============== SECTION 1 END =============== -->
    
    <!-- =============== SECTION 2 =============== -->
    <section class="padding-bottom">
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">Electronics</h4>
    </header>
    
    <div class="card card-home-category">
    <div class="row no-gutters">
        <div class="col-md-3">
        
        <div class="home-category-banner bg-light-orange">
            <h5 class="title">Machinery items for manufacturers</h5>
            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <a href="#" class="btn btn-outline-primary rounded-pill">Source now</a>
            <img src="{{asset('public/frontend/images/items/14.jpg')}}" class="img-bg">
        </div>
    
        </div> <!-- col.// -->
        <div class="col-md-9">
    <ul class="row no-gutters bordered-cols">
        <li class="col-6 col-lg-3 col-md-4">
    <a href="#" class="item"> 
        <div class="card-body">
            <h6 class="title">Well made electronic  stuff collection  </h6>
            <img class="img-sm float-right" src="{{asset('public/frontend/images/items/7.jpg')}}"> 
            <p class="text-muted"><i class="fa fa-map-marker-alt"></i> Tokyo, Japan</p>
        </div>
    </a>
        </li>
        
    </ul>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    </div> <!-- card.// -->
    </section>
    <!-- =============== SECTION 2 END =============== -->  
    <!-- =============== SECTION ITEMS =============== -->
    <section  class="padding-bottom-sm">
    
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">SẢN PHẦM ĐỀ XUẤT</h4>
    </header>
    
    <div class="row row-sm">
        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
            <div href="#" class="card card-sm card-product-grid">
                <a href="#" class="img-wrap"> <img src="{{asset('public/frontend/images/items/1.jpg')}}"> </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">Just another product name</a>
                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                </figcaption>
            </div>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    </section>
    <!-- =============== SECTION ITEMS .//END =============== -->
    
    
    <!-- =============== SECTION SERVICES =============== -->
    <section  class="padding-bottom">
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">DỊCH VỤ THƯƠNG MẠI</h4>
    </header>
    
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <article class="card card-post">
              <img src="{{asset('public/frontend/images/posts/1.jpg')}}" class="card-img-top">
              <div class="card-body">
                <h6 class="title">Trade Assurance</h6>
                <p class="small text-uppercase text-muted">Order protection</p>
              </div>
            </article> <!-- card.// -->
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    
    </section>
    <!-- =============== SECTION SERVICES .//END =============== -->      
@endsection
