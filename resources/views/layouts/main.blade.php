<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bullseye Utility Locating?</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAohti8tMHBtpCwcsoKlDc3cxjByw7QGWE&sensor=false&libraries=places'></script>
    <!-- Theme style -->
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/skin-red.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('bower_components/jquery-ui/themes/smoothness/jquery-ui.css') }}" rel="stylesheet">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">--}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
    <link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/skins/skin-red.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/skin-red.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.css') }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
</head>
<body id="app" class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <img src="{{asset('/img/main-logo.png')}}"  style="width: 177px" class="logo" alt="">

            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <?php if((\Illuminate\Support\Facades\Auth::id() != 2)){ ?>

                        <li class="custom-home-login"><a href="http://www.bullseyelocating.com/">Go To Website</a></li>

                        <?php } ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest


                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                @if(\Illuminate\Support\Facades\Auth::id() == 2)
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-user-circle-o"></i> <span>Users</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i>View Users</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar"></i> <span>Appointments</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('appointments')}}"><i class="fa fa-circle-o"></i>View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-product-hunt"></i> <span>All Projects</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('user_projects')}}"><i class="fa fa-circle-o"></i>View EM Projects</a></li>
                            <li><a href="{{route('projectCement')}}"><i class="fa fa-circle-o"></i>View Cement Projects</a> </li>
                            <li><a href="{{route('projectGpr')}}"><i class="fa fa-circle-o"></i>View GPR Projects</a></li>
                            <li><a href="{{route('projectPel')}}"><i class="fa fa-circle-o"></i>View PEL Projects</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span> Employees</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('view_employee')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{url('employee')}}"><i class="fa fa-circle-o"></i>Add Employees</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-qrcode"></i> <span> Promocode</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('promocode.index') }}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{ route('promocode.create') }}"><i class="fa fa-circle-o"></i>Add Promocode</a></li>

                        </ul>
                    </li>


                @else
                    <li >
                        <a href="{{route('user_projects')}}">
                            <i class="fa fa-product-hunt"></i> <span>View Projects</span>
                        </a>


                    </li>
                @endif


                @if(\Illuminate\Support\Facades\Auth::id() != 2)

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i><span>Order a new project</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('es') }}" target="_blank" ><i class="fa fa-circle-o"></i> EM  SERVICE</a></li>
                            <li>  <a href="{{ route('cement') }}" target="_blank"><i class="fa fa-circle-o"></i>  CEMENT SERVICE</a>   </li>
                            <li>  <a href="{{ route('gpr') }}" target="_blank"><i class="fa fa-circle-o"></i> GPR SERVICE</a>   </li>
                            <li>  <a href="{{ route('pel') }}" target="_blank"><i class="fa fa-circle-o"></i> PEL Service </a></li>

                        </ul>
                    </li>

                @endif


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file"></i> <span>Documents</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{url('new_uploading')}}"><i class="fa fa-circle-o"></i>View Document</a></li>
                        {{--  <li><a href="{{route('documents_view')}}"><i class="fa fa-circle-o"></i>View</a></li>--}}

                    </ul>
                </li>

                <li>
                    <a href="{{ route('invoice') }}">
                        <i class="fa fa-money" aria-hidden="true"></i>Invoices</span>
                    </a>

                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(session('success'))
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ session('success') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>

            </div>
        @elseif(session('status'))
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ session('status') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>

            </div>
        @endif

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <p>© 2019&nbsp;All rights Reserved <span>Bullseye Locating</span></p>
        {{--        <strong>Copyright &copy; 2018 <a href=#">  </a>.</strong> All rights--}}

    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

{{--location picker--}}

<link href="{{ asset('js/datetimepicker/build/jquery.datetimepicker.min.css') }}" rel="stylesheet">
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

<script src="{{ asset('js/croppie.js') }}"></script>
<script src="{{ asset('js/notify.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>


{{--
<script>

    jQuery.noConflict();

</script>
--}}


<script src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAohti8tMHBtpCwcsoKlDc3cxjByw7QGWE&sensor=false&libraries=places'></script>

<script src="{{ asset('js/jquery.datetimepicker.min.js') }}"></script>
<link href="{{ asset('js/jquery.datetimepicker.min.css') }}" rel="stylesheet" />

@yield('scripts')
@yield('javascript')

<script>

    // $.datetimepicker.setLocale('en');
    /* jQuery('#starttime').datetimepicker(
         {
             formatTime:'H:i',
             formatDate:'d.m.Y',
             //defaultDate:'8.12.1986', // it's my birthday
             defaultDate:'+03.01.1970', // it's my birthday
             defaultTime:'10:00',
         }
     );
     jQuery('#endtime').datetimepicker(
         {
             formatTime:'H:i',
             formatDate:'d.m.Y',
         }
     );*/
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    });

</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script type="text/javascript">

    new WOW().init();
</script>

</body>
</html>
