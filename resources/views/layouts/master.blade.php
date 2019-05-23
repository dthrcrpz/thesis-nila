<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title }} | Thesis Book Archiving System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="/cms-assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/cms-assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/cms-assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="/cms-assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/cms-assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/cms-assets/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="/cms-assets/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/cms-assets/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="/cms-assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="/cms-assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="/cms-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">TBA</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>PSU-</b>TBA</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <!-- User Account: style can be found in dropdown.less -->
                            @if (auth()->check())
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="/logo.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ (auth()->check()) ? auth()->user()->name : '' }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="/logo.png" class="img-circle" alt="User Image">
                                        <p>
                                            {{ (auth()->check()) ? auth()->user()->name : '' }}
                                            @if (auth()->user()->name != 'Guest')
                                            <small>{{ (auth()->check() && auth()->user()->role == 0) ? 'Admin' : 'Student' }}</small>
                                            @endif
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            @if (auth()->user()->name != 'Guest')
                                            <a href="/change-password" class="btn btn-default btn-flat">Change change-passwordord</a>
                                            @endif
                                        </div>
                                        <div class="pull-right">
                                            <a href="javascript:void(0)" class="btn btn-info btn-flat btn-logout">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            <!-- Control Sidebar Toggle Button -->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="{{ setActive('/') }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="{{ setActive('theses') }}"><a href="/theses"><i class="fa fa-book"></i> <span>Theses</span></a></li>
                        @if (auth()->check() && auth()->user()->role == 0)
                        <li class="{{ setActive('users') }}"><a href="/users"><i class="fa fa-users"></i> <span>Users</span></a></li>
                        @endif
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @include('includes.validation-errors')
                @include('includes.success-messages')
                @yield('content')
            </div>

            @include('includes.delete-confirmation')
            @include('includes.view-modal')

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2019</strong>
            </footer>
            <!-- Tab panes -->
            <div class="tab-content">
            </div>
        </aside>
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    </div>

    <form method="post" id="delete-form" action="">
        @csrf
        @method('delete')
    </form>

    @guest

    @else
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endguest

    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="/cms-assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/cms-assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/cms-assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- daterangepicker -->
    <script src="/cms-assets/bower_components/moment/min/moment.min.js"></script>
    <script src="/cms-assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/cms-assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/cms-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/cms-assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/cms-assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/cms-assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/cms-assets/dist/js/pages/dashboard.js"></script>
    <!-- DataTables -->
    <script src="/cms-assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/cms-assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
</body>
</html>