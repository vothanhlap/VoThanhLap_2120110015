@extends('layouts.site')
@section('title', $post->title)
@section('content')
    <section>
        <div class="container">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-8">
                        <h6 class="text-danger mt-4" style="text-transform: uppercase;">{{ $post->title }}</h6>
                        <span><i class="fa fa-user"></i> {{ $post->created_by }}</span>
                        <span class="mx-2">
                            <i class="far fa-calendar-alt"></i>
                            {!! date('d/m/Y', strtotime($post->created_at)) !!}
                        </span>
                        <hr>
                        <div class="mx-2 text-justify" style="font-size: 25px;">
                            <p>{!! $post->metadesc !!}</p>
                            <img src="{{ asset('images/post/' . $post->image) }}" class="img-fluid "
                                alt="{{ $post->image }}">
                            <br>

                            {!! $post->detail !!} <br>
                        </div>
                        {{-- metakey -tu khoa --}}
                        <div>
                            <span> <i class="fas fa-tags text-danger"></i></span>
                            <span class="badge bg-primary mb-4 mt-2">
                                {!! $post->metakey !!}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <h5 class="title-section text-uppercase"> <i class="fas fa-mail-bulk"></i> TẤT CẢ BÀI VIẾT</h5>
                        <hr>
                        @foreach ($post_list as $item)
                        @php
                        $mo_ta = $item->metadesc;
                        $rut_gon = substr($mo_ta, 0, 120);
                         @endphp
                        <article class="media mb-3">
                            <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><img style="height:80px" class="img-sm mr-3" src="{{ asset('images/post/'.$post->image) }}" alt="{{$post->image}}"></a>
                            <div class="media-body">
                                <h6  class="mt-0   "><a  href="{{route('frontend.slug',['slug'=>$item->slug])}}">{{$item->title}}</a></h6>
                                  <span><i class="fa fa-user "></i> {{$item->created_by}}</span> 
                                  <span class="mx-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                    <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                  </svg>
                                   {!! date('d/m/Y', strtotime($item->created_at)) !!}
                                  </span>
                              </div>
                        </article>
                        @endforeach
                        
                    </div>
                </div>
            </div>
    </section>
@endsection
