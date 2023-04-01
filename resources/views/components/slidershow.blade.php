<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
          <li data-target="#carousel1_indicator" data-slide-to="1"></li>
          <li data-target="#carousel1_indicator" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @foreach ($list_slider as $slider)
             @if ($loop->first)
             <div class="carousel-item active">
              <img src="{{asset('images/slider/'.$slider->image)}}" alt="First slide"> 
            </div>
             @else
             <div class="carousel-item">
              <img src="{{asset('images/slider/'.$slider->image)}}" alt="slide"> 
            </div> 
             @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> 
</div>