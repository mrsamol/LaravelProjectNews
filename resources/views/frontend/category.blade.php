@extends('frontend.master')

@section('title')
  Category
@stop
@section('content')
    
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