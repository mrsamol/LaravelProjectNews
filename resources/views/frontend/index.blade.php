@extends('frontend.master')

@section('title')
  Home
@stop
@section('content')
    
    <section class="slider-area">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        
        <!-- The slideshow -->
        <div class="carousel-inner">
          @foreach($sliders as $slider)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{('/assets/uploads/slider/')}}/{{$slider->image}}" alt="{{$slider->title}}" width="100%">
          </div>
          @endforeach
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </section>
    <section class="main-area mt-4 mb-4">
      <div class="container">
        <div class="row">
          @foreach($posts as $post)
          <div class="col-12 col-sm-6 col-md-3">
            
            <div class="card">
              <a href="{{route('post.detail',$post->id)}}">
                <img class="card-img-top" src="{{asset('/assets/uploads/post/')}}/{{$post->image}}" alt="{{$post->title}}" style="width:100%">
              </a>
              <div class="card-body">
                <a href="{{route('post.detail',$post->id)}}">
                  <h2 class="card-title" style="font-size: 18px;">{{Str::limit($post->title,20)}}</h2>
                </a>
                <p class="card-text">{{Str::limit($post->content,100)}}</p>
              </div>
            </div>
            
          </div>
          @endforeach
          
        </div>
      </div>
    </section>

 @stop   