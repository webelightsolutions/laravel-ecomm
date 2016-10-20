<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $page_title or "Ecomm.|Admin" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ asset("assets/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/css/ionicons.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />

        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-green.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css")}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css" >
        <link href="{{ asset("/bower_components/AdminLTE/plugins/iCheck/square/blue.css")}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="{{ asset("assets/css/custom-admin.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/css/jquery-filestyle.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/css/select2.bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
        <link href="{{ asset("assets/css/bootstrap-popover-x.css")}}" rel="stylesheet" type="text/css" />


        <!-- If you'd like to support IE8 -->
    </head>
    <body class="skin-green">
        <div class="wrapper">

            <!-- Header -->
            @include('admin.layouts.header')

            <!-- Sidebar -->
            @include('admin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- <section class="content-header">
                    <h1>
                        {{ $page_title or "Page Title" }}
                        <small>{{ $page_description or null }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol>
                </section> -->

                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Footer -->
            @include('admin.layouts.footer')

        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.2.3 -->
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
        <!--Datatable -->
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript"></script>
        <!--Datatable Bootstrap-->
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>
        <!--Colorpicker Bootstrap-->
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js") }}" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <!--select2 Bootstrap-->
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/select2/select2.full.min.js") }}"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/assets/js/jquery.img-preview.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/assets/js/jquery-filestyle.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/assets/js/bootstrap-popover-x.js") }}"></script>

        <script src="{{ asset ("/assets/js/admin.js") }}" type="text/javascript"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
              Both of these plugins are recommended to enhance the
              user experience -->
    </body>
</html>