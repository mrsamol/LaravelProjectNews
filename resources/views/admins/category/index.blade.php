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
              <h3 class="box-title">All Users</h3>
              <a href="{{route('dashboard.category.create')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Create New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="category-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categories as $cate)
                <tr>
                  <td>{{$cate->name}}</td>
                
                  <td>
                    <a href="{{route('dashboard.category.edit',$cate->id)}}" title="Edit" class="btn btn-success">Edit</a>
                    <a href="{{route('dashboard.category.delete',$cate->id)}}" title="Delete" class="btn btn-danger">Delete</a>
                    <a href="{{route('dashboard.category.show',$cate->id)}}" title="Show" class="btn btn-warning">Show</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
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
      $('#category-list').DataTable({
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