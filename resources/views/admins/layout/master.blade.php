<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/assets/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/assets/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('/assets/admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/skins/_all-skins.min.css')}}">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('/assets/uploads/profile')}}/{{Auth::User()->profile}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::User()->first_name}} {{Auth::User()->last_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('/assets/uploads/profile')}}/{{Auth::User()->profile}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::User()->first_name}} {{Auth::User()->last_name}} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>

              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('dashboard.users.profile',Auth::User()->id)}}" class="btn btn-success btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('dashboard.users.logout')}}" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/assets/uploads/profile')}}/{{Auth::User()->profile}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::User()->first_name}} {{Auth::User()->last_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{route('dashboard.index')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
         
        </li>
        <li>
          <a href="{{route('dashboard.users.index')}}">
            <i class="fa fa-users" aria-hidden="true"></i> <span>Users Management</span>
           
          </a>
         
        </li>
         <li>
          <a href="{{route('dashboard.category.index')}}">
            <i class="fa fa-th-list" aria-hidden="true"></i> <span>Category</span>
           
          </a>
         
        </li>
        <li>
          <a href="{{route('dashboard.post.index')}}">
            <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Posts</span>
           
          </a>
         
        </li>
         <li>
          <a href="{{route('dashboard.slider.index')}}">
            <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Sliders</span>
           
          </a>
         
        </li>
         <li>
          <a href="{{route('dashboard.setting.index')}}">
            <i class="fa fa-cogs" aria-hidden="true"></i> <span>Setting</span>
           
          </a>
         
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('/assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/assets/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/assets/admin/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('/assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('/assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- SlimScroll -->
<script src="{{asset('/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/assets/admin/bower_components/chart.js/Chart.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('/assets/admin/dist/js/demo.js')}}"></script>

@yield('script')
</body>
</html>
