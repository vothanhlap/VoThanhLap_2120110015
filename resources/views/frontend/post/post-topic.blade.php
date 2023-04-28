@extends('layouts.site')
@section('title', $row_topic->title)
@section('content')
    <div class="">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <header class="section-heading heading-line">
                        <h4 class="title-section text-uppercase">{{ $row_topic->title }}</h4>
                    </header>
                    @foreach ($post_list as $item)
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <a href="">
                                    <img style="height:200px" src="{{ asset('images/post/' . $item->image) }}"
                                        class="card-img-top" alt="{{ $item->image }}">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">
                                    <h5 class="card-title text-truncate">{{ $item->title }}</h5>
                                </a>
                                <span class="font-weight">Người đăng:{{ $item->created_by }} - Ngày đăng:
                                    {!! date('d/m/Y', strtotime($item->created_at)) !!} </span>
                               <p></p>
                                <p class="text-justify">{!! $item->metadesc !!} </p>
                                <p></p>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <h5 class="title-section text-uppercase mt-4"><i class="fas fa-mail-bulk"></i> TẤT CẢ BÀI VIẾT</h5>
                    <div class="box-scroll">
                        @foreach ($post_all as $item)
                            <article class="media mb-3">
                                <a href="{{ route('frontend.slug', ['slug' => $item->slug]) }}"><img style="height:60px"
                                        class="img-sm mr-2" src="{{ asset('images/post/' . $item->image) }}"
                                        alt="{{ $item->image }}"></a>
                                <div class="media-body">
                                    <h6 class="mt-0"><a
                                            href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h6>
                                    {{-- <span>
                                        <i class="far fa-calendar-alt"></i>
                                        {!! date('d/m/Y', strtotime($item->created_at)) !!}
                                    </span> --}}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <div class="col-12 mb-4">
                    {{ $post_list->links() }}
                </div>
                {{-- bai viet theo loai --}}
                <div class="mb-4">
                    <h4 class="text-info">Bài viết khác</h4>
                <ul>
                    @foreach ($post_list as $item)
                        <li><a style="font-size: 18px;"
                                href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
          
        </div>
        
    </div>

@endsection
