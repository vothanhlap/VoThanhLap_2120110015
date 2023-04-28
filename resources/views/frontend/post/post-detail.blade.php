@extends('layouts.site')
@section('title', $post->title)
@section('content')
    <section>
        <div class="container">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-9">
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
                        <hr>
                        {{-- bai viet theo loai --}}
                        <h4 class="text-info">Bài viết khác</h4>
                        <ul style="list-style: none;">    
                            @foreach ($post_list as $item)
                            <li ><a style="font-size: 20px;"
                                        href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>
                    <div class="col-md-3 mt-4">
                        <h5 class="title-section text-uppercase"> <i class="fas fa-mail-bulk"></i> TẤT CẢ BÀI VIẾT</h5>
                        <hr>
                        <div class="box-scroll">
                            @foreach ($post_all as $item)
                            @php
                            $mo_ta = $item->metadesc;
                            $rut_gon = substr($mo_ta, 0, 120);
                             @endphp
                            <article class="media mb-3">
                                <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><img style="height:80px" class="img-sm mr-3" src="{{ asset('images/post/'.$item->image) }}" alt="{{$item ->image}}"></a>
                                <div class="media-body">
                                    <h6  class="mt-0   "><a  href="{{route('frontend.slug',['slug'=>$item->slug])}}">{{$item->title}}</a></h6>
                                      </span>
                                  </div>
                            </article>
                            @endforeach
                        </div>  
                    </div>
                </div>
            </div>
    </section>
@endsection
