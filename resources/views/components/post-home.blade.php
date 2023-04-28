  @foreach ($list_post as $post)

  <article class="media mb-3">
    <a href="{{route('frontend.slug',['slug'=>$post->slug])}}"><img style="height:80px" class="img-sm mr-3" src="{{ asset('images/post/'.$post->image) }}" alt="{{$post->image}}"></a>
    <div class="media-body">
        <h6  class="mt-0  "><a  href="{{route('frontend.slug',['slug'=>$post->slug])}}">{{$post->title}}</a></h6>
        <i class="far fa-calendar-alt"></i>
           {!! date('d/m/Y', strtotime($post->created_at)) !!}
          </span>
      </div>
</article>
<hr>

  @endforeach 
  
