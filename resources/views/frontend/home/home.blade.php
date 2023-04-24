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
                <div class="d-flex justify-content-end">
                    <a class="align-items-center justify-content-end mb-2"
                        href="{{ route('frontend.slug', ['slug' => $catrow->slug]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                            <path fill-rule="evenodd"
                                d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        Xem tất cả
                    </a>
                </div>
            </div>
            <div class="card card-home-category">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <div class="home-category-banner bg-light-orange">
                            <h5 class="title">{{ $catrow->metakey }}</h5>
                            <p>{{ $catrow->metadesc }}</p>
                            <a href="#" class="btn btn-outline-primary rounded-pill">Xem ngay</a>
                            {{-- <img class="img-sm float-right" src="" alt="{{$image}}">  --}}
                            <img src="{{ asset('images/category/' . $catrow->image) }}" class="img-bg">
                        </div>
                    </div> <!-- col.// -->
                    <div class="col-md-9">
                        <ul class="row no-gutters bordered-cols">
                            <x-product-home :cat="$catrow" />
                        </ul>

                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
            {{-- <div class="row row-cols-1 row-cols-md-3 ">
	   </div> --}}
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
