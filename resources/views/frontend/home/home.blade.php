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
 <!-- ============================  FILTER TOP  ================================= -->
<div class="card mb-3">
	<div class="card-body">
<div class="row">
	<div class="col-md-2">Filter by</div> <!-- col.// -->
	<div class="col-md-10"> 
		<ul class="list-inline">
		  <li class="list-inline-item mr-3 dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">   Supplier type </a>
            <div class="dropdown-menu p-3" style="max-width:400px;">	
		      <label class="form-check">
		      	 <input type="radio" name="myfilter" class="form-check-input"> Good supplier
		      </label>
		      <label class="form-check">	
		      	 <input type="radio" name="myfilter" class="form-check-input"> Best supplier
		      </label>
		      <label class="form-check">
		      	 <input type="radio" name="myfilter" class="form-check-input"> New supplier
		      </label>
            </div> <!-- dropdown-menu.// -->
	      </li>
	      <li class="list-inline-item mr-3 dropdown">
	      	<a href="#" class="dropdown-toggle" data-toggle="dropdown">  Country </a>
            <div class="dropdown-menu p-3">	
		      <label class="form-check"> 	 <input type="checkbox" class="form-check-input"> China    </label>
		      <label class="form-check">   	 <input type="checkbox" class="form-check-input"> Japan      </label>
		      <label class="form-check">    <input type="checkbox" class="form-check-input"> Uzbekistan  </label>
		      <label class="form-check">  <input type="checkbox" class="form-check-input"> Russia     </label>
            </div> <!-- dropdown-menu.// -->
	      </li>
		  <li class="list-inline-item mr-3 dropdown">
		  	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Feature</a>
		  	<div class="dropdown-menu">
		  		<a href="" class="dropdown-item">Anti backterial</a>
		  		<a href="" class="dropdown-item">With buttons</a>
		  		<a href="" class="dropdown-item">Extra safety</a>
		  	</div>
		  </li>
		  <li class="list-inline-item mr-3"><a href="#">Color</a></li>
		  <li class="list-inline-item mr-3"><a href="#">Size</a></li>
		  <li class="list-inline-item mr-3">
		  	<div class="form-inline">
		  		<label class="mr-2">Price</label>
				<input class="form-control form-control-sm" placeholder="Min" type="number">
					<span class="px-2"> - </span>
				<input class="form-control form-control-sm" placeholder="Max" type="number">
				<button type="submit" class="btn btn-sm btn-light ml-2">Ok</button>
			</div>
		  </li>
		  <li class="list-inline-item mr-3">
		  
		  </li>
		</ul>
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</div> <!-- card.// -->

<div class="container">
		@foreach ($category_home as $catrow)
		<div class="">
			<header class="section-heading heading-line">
				<h4 class="title-section text-uppercase">{{$catrow->name}}</h4>
			</header>
			<div class="d-flex justify-content-end">
				<a class="align-items-center justify-content-end mb-2" href="{{route('frontend.slug',['slug'=>$catrow->slug])}}">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
						<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
					  </svg>
					Xem tất cả
				</a>
			</div>
        </div>
		<div class="card card-home-category">
			<div class="row no-gutters">
				<div class="col-md-3">
				<div class="home-category-banner bg-light-orange">
					<h5 class="title">{{$catrow->metakey}}</h5>
					<p>{{$catrow->metadesc}}</p>
					<a href="#" class="btn btn-outline-primary rounded-pill">Xem ngay</a>
					{{-- <img class="img-sm float-right" src="" alt="{{$image}}">  --}}
					<img src="{{ asset('images/category/'.$catrow->image)}}" class="img-bg">
				</div>
			
				</div> <!-- col.// -->
				<div class="col-md-9">
			<ul class="row no-gutters bordered-cols">
				<x-product-home :cat="$catrow"  />
			</ul>
				</div> <!-- col.// -->
			</div> <!-- row.// -->
			</div> <!-- card.// -->




		   {{-- <div class="row row-cols-1 row-cols-md-3 ">
			
	   </div> --}}
	   @endforeach
	</div>
 @includeIf('frontend.post.post-page')
 
<!-- ============================ FILTER TOP END.// ================================= -->
     <!-- =============== SECTION REGION =============== -->
	 <x-brand-content/>
	 <!-- =============== SECTION REGION .//END =============== -->
	 <article class="my-4">
		<img src="{{ asset('public/frontend/images/banners/ad-sm.png') }}" class="w-100">
	</article>
@endsection
