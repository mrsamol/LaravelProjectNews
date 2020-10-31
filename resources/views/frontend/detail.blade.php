@extends('frontend.master')
@section('title')
Home
@stop
@section('content')

<section class="main-area mt-4 mb-4">
  <div class="container">
    <div class="col-12">      
      <img class="card-img-top mb-4" src="{{asset('/assets/uploads/post/')}}/{{$post->image}}" alt="{{$post->title}}" style="width:100%">
      <h2 class="card-title mb-3" style="font-size: 18px;">{{$post->title}}</h2>
      
      <p class="card-text">{{$post->content}}</p>
      
    </div>
    
  </div>
</section>
@stop