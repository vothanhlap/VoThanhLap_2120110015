@extends('layouts.site')
@section('title',$row_topic->title)
@section('content')
<div class="col-md-12">

    <div class="row">
        <div class="col-md-9 border-right">
            <header class="section-heading heading-line">
                <h4 class="title-section text-uppercase">{{ $row_topic->title }}</h4>
            </header>
            <div class="post_topic">
                @foreach ($post_list as $item)
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img style="height:200px; width:300px" src="{{ asset('images/post/'.$item->image) }}" class="card-img-top"
                            alt="{{$item->image}}">
                    </div>
                    <div class="col-md-8">
                        <a href="{{route('frontend.slug',['slug'=>$item->slug])}}">
                            <h5 class="card-title">{{ $item->title }}</h5>
                        </a>
                        <div class="col">
                            <span class="font-weight-lighter">Người đăng:{{ $item->created_by }} </span>                       
                               <span class="font-weight-lighter"> Ngày đăng:  {!! date('d/m/Y', strtotime($item->created_at)) !!}</span>                    
                        </div>
                        <div class="mt-4">{!!$item->metadesc!!}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <h5 class="title-section text-uppercase mt-4"><i class="fas fa-mail-bulk"></i>  TẤT CẢ BÀI VIẾT</h5>      
            <div class="box-scroll ">
                <div class="row " >
                   @foreach ($post_all as $item)
                   @php
                       $mo_ta = $item->title;
                        $rut_gon = substr($mo_ta, 0, 80).'...';
                   @endphp
                   <div class="col-md-4 mb-4 mt-2 ">
                    <img  src="{{ asset('images/post/' . $item->image) }}" class="card-img-top"
                            alt="{{ $item->image }}">
                   </div>
                   <div class="col-md-8 mb-2 " >
                    <a href="{{route('frontend.slug',['slug'=>$item->slug])}}">{!!$rut_gon!!}</a>
                   </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="col-12 mb-4">       
        {{$post_list->links()}}
    </div>

@endsection