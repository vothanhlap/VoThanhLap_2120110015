@extends('layouts.site')
@section('title', $page->title)
@section('content')
 
    <section>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                  <div>
                    <h1 class="text-danger mt-2" style="text-transform: uppercase;">{{ $page->title }}</h1>
                    <span class="mx-2 mt-2">
                        <i class="far fa-calendar-alt"></i>
                        {{ $page->created_at }}
                    </span>
                    <span class="mx-2 mt-2"><i class="far fa-user"></i>{{ $page->created_by }}</span>
                    <span class="mx-2 mt-2"><i class="far fa-eye"></i></span>
                    <br>
                    <div class=" mt-4 mx-2 text-justify" style="font-size: 20px;">
                        <p>{!!$page->detail!!}</p>

                        <p>{!!$page->metadesc!!}</p>
                    </div>
                </div>
                    <div>
                        <div class="extranews_separator"></div>
                        <h4>Bài viết khác</h4>
                        <ul>
                            @foreach ($post_list as $item)
                                <li><a style="font-size: 18px;"
                                        href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div>
                        <span> <i class="fas fa-tags text-danger"></i></span>
                        <span class="badge bg-primary mb-4 mt-2">
                            {!!$page->metakey !!}
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
        </div>
    </section>
@endsection
