@extends('layouts.site')
@section('title', $post->title)
@section('content')
    <section>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-danger mt-2" style="text-transform: uppercase;">{{ $post->title }}</h1>
                    <div class="col-md-12">
                        <span><i class="fa fa-user"></i> {{ $post->created_by }}</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-stopwatch" viewBox="0 0 16 16">
                                <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                <path
                                    d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                            </svg>
                            {{ $post->created_at }}
                        </span>
                    </div>
                    <h3 class="mt-2">{{ $post->metakey }}</h3>
                    @php
                        $arr_image = $post->postimg;
                        $image = 'hinh.png';
                        if (count($arr_image) > 0) {
                            $image = $arr_image[0]['image'];
                        }
                    @endphp
                    <img src="{{ asset('images/post/' . $image) }}" class="img-fluid mt-2" alt="{{ $image }}">
                    <p class="mt-4">{{ $post->metadesc }}</p>
                    @php
                        $arr_image = $post->postimg;
                        $image2 = 'hinh2.png';
                        if (count($arr_image) > 0) {
                            $image2 = $arr_image[1]['image'];
                        }
                    @endphp
                    <img src="{{ asset('images/post/' . $image2) }}" class="img-fluid mt-2" alt="{{ $image2 }}">
                    <p class="mt-4 mb-2">{{ $post->detail }}</p>
                {{-- đánh giá khách hàng --}}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Đánh giá</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                </div>

                {{-- xử lý đánh giá khách hàng  --}}
                <div class="col-md-4">
                    <div class="box mt-4">
                        <h5 class="title-description">BÀI VIẾT KHÁC</h5>
                        <hr>

                        @foreach ($post_list as $item)
                            @php
                                $arr_image = $item->postimg;
                                $image = 'hinh.png';
                                if (count($arr_image) > 0) {
                                    $image = $arr_image[0]['image'];
                                }
                            @endphp
                            <article class="media mb-3">
                                <a href="#"><img class="img-sm mr-3"
                                       width="50px" height="50px"  src="{{ asset('images/post/' . $image) }}"></a>
                                <div class="media-body">
                                    <h6 class="mt-0"><a
                                            href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h6>
                                    <span><i class="fa fa-user"></i> {{ $item->created_by }}</span>
                                  <br>  <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                            <path
                                                d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                            <path
                                                d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                        </svg>
                                        {{ $item->created_at }}
                                    </span>
                                </div>
                            </article>
                        @endforeach

                    </div> <!-- box.// -->
                </div>

            </div>
        </div>
    </section>
@endsection


<br>
