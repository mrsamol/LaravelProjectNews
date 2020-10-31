@extends('admins.layout.master')
@section('title')
 Single Category | Dashboard
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
              <h3 class="box-title">Single Category</h3>
              <a href="{{route('dashboard.category.index')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="category-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                </tr>
                </thead>
                <tbody>
            
                <tr>
                  <td>{{$category->name}}</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
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