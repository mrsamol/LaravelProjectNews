@extends('admins.layout.master')
@section('title')
 Update Category | Dashboard
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Update Category</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Category</h3>
              <a href="{{route('dashboard.category.index')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Back</a>
            </div>
            <!-- /.box-header -->
            <form action="{{route('dashboard.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
              
           @csrf
            <div class="box-body">
  
                <div class="form-group">
                  <label for="name"> name</label>
                  <input type="text" name="name" class="form-control" required="" placeholder="name" value="{{$category->name}}">
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
    
  @endsection
@endsection