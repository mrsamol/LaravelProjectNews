@extends('admins.layout.master')
@section('title')
 Create Slider | Dashboard
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Slider</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <!-- Info boxes -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Slider</h3>
              <a href="{{route('dashboard.slider.index')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Back</a>
            </div>
            <!-- /.box-header -->
            <form action="{{route('dashboard.slider.store')}}" method="post" enctype="multipart/form-data">
              
           @csrf
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2">
                  <div class="form-group profile-img" style="width: 150px;height: 150px;background: #eee;position: relative;border-radius: 100%;z-index: 0">
                    <img src="{{asset('/assets/uploads/slider/default.jpg')}}" alt="" style="width: 100%;height: 100%;border-radius: 100%;z-index: -1" id="output-image">
                  <input type="file" name="image" style="width: 100%;height: 100%;border-radius: 100%;opacity: 0;z-index: 9999;position: absolute;left: 0;top:0;" id="profile-img">
                </div>
                </div>

                <div class="col-xs-12 col-sm-10 col-md-10">
                     <div class="form-group">
                      <label for="title"> Title</label>
                      <input type="text" name="title" class="form-control" required="" placeholder="Title">
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">

                </div>
              </div>
              
                       
              <div class="form-group">
                <label for="content"> Content</label>
                <textarea name="content" class="form-control" rows="7" placeholder="Content"></textarea>
              </div>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
            <!-- /.box-body -->

            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>

  @section('script')
    <script>
       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#output-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
  </script>
  @endsection
@endsection