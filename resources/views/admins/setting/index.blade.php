@extends('admins.layout.master')
@section('title')
  All Setting | Dashboard
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
        <li><a href="#"><i class="fa fa-dashboard"></i> All Setting</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Setting</h3>
              <a href="{{route('dashboard.setting.create')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Create New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="setting-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($settings as $setting)
                <tr>
                  <td>
                    <img src="{{asset('/assets/uploads/setting/')}}/{{$setting->logo}}" alt="{{$setting->title}}" style="width: 50px;">
                  </td>
                  <td>{{$setting->title}}</td>
                  
                  <td>
                    <a href="{{route('dashboard.setting.edit',$setting->id)}}" title="Edit" class="btn btn-success">Edit</a>
                    <a href="{{route('dashboard.setting.delete',$setting->id)}}" title="Delete" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Title</th>
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
      $('#setting-list').DataTable({
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