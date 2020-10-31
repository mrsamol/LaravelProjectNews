@extends('admins.layout.master')
@section('title')
  All Post | Dashboard
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
        <li><a href="#"><i class="fa fa-dashboard"></i> All Post</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Slider</h3>
              <a href="{{route('dashboard.slider.create')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Create New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="slider-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($sliders as $slider)
                <tr>
                  <td>
                    <img src="{{asset('/assets/uploads/slider/')}}/{{$slider->image}}" alt="{{$slider->title}}" style="width: 50px;">
                  </td>
                  <td>{{$slider->title}}</td>
                  <td>
                    <a href="{{route('dashboard.slider.edit',$slider->id)}}" title="Edit" class="btn btn-success">Edit</a>
                    <a href="{{route('dashboard.slider.delete',$slider->id)}}" title="Delete" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>

  @section('script')
    <script>
    $(function () {
      $('#slider-list').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })
  </script>
  @endsection
@endsection