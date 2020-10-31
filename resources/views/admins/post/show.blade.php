@extends('admins.layout.master')
@section('title')
  Show Post | Dashboard
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Show Post</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Show Post</h3>
              <a href="{{route('dashboard.post.index')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="post-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Post By</th>
                  <th>Category</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                 
                <tr>
                  <td>
                    <img src="{{asset('/assets/uploads/post/')}}/{{$post->image}}" alt="{{$post->title}}" style="width: 50px;">
                  </td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->users['first_name']}} {{$post->users['last_name']}}</td>
                  <td>{{$post->categories['name']}}</td>
                  <td>
                    @if($post->status==1)
                      <span class="btn btn-success">Active</span>
                    @else
                      <span class="btn btn-danger">InActive</span>
                    @endif
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Post By</th>
                  <th>Category</th>
                  <th>Status</th>
                </tr>
                </tfoot>
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
      $('#post-list').DataTable({
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