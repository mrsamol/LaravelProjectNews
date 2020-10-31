<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') | news</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <section class="header-area">
      
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
          @foreach($logos as $logo)
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('/assets/uploads/setting/')}}/{{$logo->logo}}" alt="" style="width: 50px;border-radius: 100%"></a>
          @endforeach
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home</a>
              </li>
              @foreach($categories as $cate)
              <li class="nav-item">
                <a class="nav-link" href="{{route('post.by.category',$cate->id)}}">{{$cate->name}}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </nav>
    </section>
    @yield('content')
    <section class="footer-area pt-3 pb-1 bg-info text-center">
      <div class="container">
        <p>Copyright ©2020 FreeCodings.com All Rights Reserved.</p>
      </div>
    </section>
  </body>
</html>