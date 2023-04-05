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
	@foreach ($category_home as $category)
	<x-product-home :category = '$category'/>
	@endforeach
	
 @includeIf('frontend.post.post-page')
<!-- ============================ FILTER TOP END.// ================================= -->
    
@endsection
