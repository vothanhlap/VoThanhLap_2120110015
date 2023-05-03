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
    <div class="container">
        <x-nav-sale />
    </div>
    <!-- ============================  FILTER TOP  ================================= -->

    <!-- =============== SECTION REGION =============== -->
    <div class="container">
        <x-brand-content />
    </div>
    <!-- =============== SECTION REGION .//END =============== -->
     <div class="container">
        @foreach ($category_home as $catrow)
            <div class="">
                <header class="section-heading heading-line">
                    <h4 class="title-section text-uppercase">{{ $catrow->name }}</h4>
                </header>
                
            </div>
            <div class="card">
                <div class="row ">
                    <div class="col-md-12"> 
                        <x-product-home :cat="$catrow" />
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
                <div class="d-flex justify-content-center">
                    <a class="align-items-center justify-content-end mb-2"
                        href="{{ route('frontend.slug', ['slug' => $catrow->slug]) }}">
                         <button class="btn btn-light" style="margin-right: 5px; margin-top:5px">
                            Xem thêm
                        </button>
                    </a>
                </div>
            </div> <!-- card.// --> 
        @endforeach
        
    </div> 
    <!-- =============== SECTION SERVICES .//END =============== -->

    <div class="container">
        <div class="row">
            @foreach ($top_home as $toprow)
                <aside class="col-md-4">
                    <div class="box mt-4">
                        <h5 class="title-description">{{ $toprow->title }}</h5>
                        <hr>
                        <x-post-home :topic="$toprow" />

                        <a class="align-items-center justify-content-end mb-2"
                            href="{{ route('frontend.slug', ['slug' => $toprow->slug]) }}">
                            Xem tất cả
                        </a>

                    </div> <!-- box.// -->

                </aside> <!-- col.// -->
            @endforeach
        </div>
    </div>
    <div class="container">
        <article class="my-4">
            @foreach ($slider as $item)
                <img src="{{ asset('images/slider/' . $item->image) }}" class="w-100" style="height: 120px">
            @endforeach
        </article>
    </div>
@endsection
