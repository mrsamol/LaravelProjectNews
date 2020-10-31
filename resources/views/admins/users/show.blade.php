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
              <h3 class="box-title">Show User</h3>
              <a href="{{route('dashboard.users.index')}}" title="Create new" class="btn btn-success text-right" style="float: right;">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Profile</th>
                  <th>First Name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Date of Birth</th>
                  <th>Education</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td>
                    <img src="{{asset('/assets/uploads/profile/')}}/{{$user->profile}}" alt="{{$user->first_name}} {{$user->last_name}}" style="width: 30px;border-radius: 100%">
                  </td>
                  <td>{{$user->first_name}}</td>
                  <td>{{$user->last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{date('d-m-Y', strtotime($user->dob))}}</td>
                  <td>{{$user->education}}</td>
                  <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                  <td>{{date('d-m-Y', strtotime($user->updated_at))}}</td>
                  <td>
                    @if($user->status==1)
                      <span class="btn btn-success">Active</span>
                    @else
                      <span class="btn btn-danger">InActive</span>
                    @endif
                  </td>
                 
                </tr>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Profile</th>
                  <th>First Name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Date of Birth</th>
                  <th>Education</th>
                  <th>Created At</th>
                  <th>Updated At</th>
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
      $('#users-list').DataTable({
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