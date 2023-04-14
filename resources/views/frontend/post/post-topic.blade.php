@extends('layouts.site')
@section('title', 'Chủ đê bài viết')
@section('content')
    <div class="col-md-12">
        <header class="section-heading heading-line">
            <h4 class="title-section text-uppercase">{{ $row_topic->title }}</h4>
        </header>
        <div class="row">
            <div class="col-md-8">
                @foreach ($post_list as $item)
                    @php
                        $arr_image = $item->postimg;
                        $image = 'hinh.png';
                        if (count($arr_image) > 0) {
                            $image = $arr_image[0]['image'];
                        }
                    @endphp
                    <div class="card mb-3">
                        <img style="height:250px" src="{{ asset('images/post/' . $image) }}" class="card-img-top"
                            alt="{{ $image }}">
                        <div class="card-body">
                            <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><h5 class="card-title">{{ $item->title }}</h5></a>
                            <p class="card-text">{{ $item->metakey }}</p>
                            <p class="card-text">
                                <span><i class="fa fa-user"></i> {{ $item->created_by }}</span> <br>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                        <path
                                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                    </svg>
                                    {{ $item->created_at }}
                                </span>
                            </p>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
@endsection
