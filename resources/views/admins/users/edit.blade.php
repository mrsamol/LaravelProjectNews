@extends('admins.layout.master')
@section('title')
  Users Management
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create User</h3>
              <a href="{{route('dashboard.users.index')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Back</a>
            </div>
            <!-- /.box-header -->
            <form action="{{route('dashboard.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
              
           @csrf
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2">
                  <div class="form-group profile-img" style="width: 150px;height: 150px;background: #eee;position: relative;border-radius: 100%;z-index: 0">
                    <img src="{{asset('/assets/uploads/profile/')}}/{{$user->profile}}" alt="" style="width: 100%;height: 100%;border-radius: 100%;z-index: -1" id="output-image">
                  <input type="file" name="profile" style="width: 100%;height: 100%;border-radius: 100%;opacity: 0;z-index: 9999;position: absolute;left: 0;top:0;" id="profile-img">
                </div>
                </div>

                <div class="col-xs-12 col-sm-10 col-md-10">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">

                      <div class="form-group">
                        <label for="first_name"> First name</label>
                        <input type="text" name="first_name" class="form-control" required="" placeholder="First name" value="{{$user->first_name}}">
                      </div>
                    </div>
                     <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="form-group">
                          <label for="last_name"> Last name</label>
                          <input type="text" name="last_name" class="form-control" required="" placeholder="Last name" value="{{$user->last_name}}">
                        </div>
                     </div>
                  </div>
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="email"> Email</label>
                      <input type="email" name="email" class="form-control" required="" placeholder="Email" value="{{$user->email}}">
                    </div>
                  </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="dob"> Date of birth</label>
                      <input type="date" name="dob" class="form-control" value="{{$user->dob}}">
                    </div> 
                  </div>
                </div>
                </div>
              </div>
        
             
              <div class="form-group">
                <label for="education"> Education</label>
                <textarea name="education" class="form-control" rows="7" placeholder="Education">{{$user->education}}</textarea>
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