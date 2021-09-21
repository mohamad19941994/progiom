<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>لوحة الإدارة</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/morris/morris.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/custom-style.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables/dataTables.bootstrap4.css')}}">


    <style>
        .new_font_family{
            font-family: inherit;
        }
        .tox .tox-statusbar a, .tox .tox-statusbar__path-item, .tox .tox-statusbar__wordcount{
            color: rgba(34,47,62,.1) !important;
            text-decoration: none;
        }
        .bootstrap-tagsinput{
            padding: 14px 6px;
        }
        .label{
            font-size: 115%;
        }

        /**{box-sizing: border-box;}
        html{height: 100%;margin: 0;}
        body{min-height: 100%;font-family: 'Roboto';margin: 0;background-color: #fafafa;}
        .container { margin: 150px auto; max-width: 960px;}*/
        /*label{display: block;padding: 20px 0 5px 0;}*/
        .tagsinput,.tagsinput *{box-sizing:border-box}
        .tagsinput{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;background:#fff;font-family:sans-serif;font-size:14px;line-height:20px;color:#556270;padding:5px 5px 0;border:1px solid #e6e6e6;border-radius:2px}
        .tagsinput.focus{border-color:#ccc}
        .tagsinput .tag{position:relative;background:#556270;display:block;max-width:100%;word-wrap:break-word;color:#fff;padding:5px 30px 5px 5px;border-radius:2px;margin:0 5px 5px 0}
        .tagsinput .tag .tag-remove{position:absolute;background:0 0;display:block;width:30px;height:30px;top:0;right:0;cursor:pointer;text-decoration:none;text-align:center;color:#ff6b6b;line-height:30px;padding:0;border:0}
        .tagsinput .tag .tag-remove:after,.tagsinput .tag .tag-remove:before{background:#ff6b6b;position:absolute;display:block;width:10px;height:2px;top:14px;left:10px;content:''}
        .tagsinput .tag .tag-remove:before{-webkit-transform:rotateZ(45deg);transform:rotateZ(45deg)}
        .tagsinput .tag .tag-remove:after{-webkit-transform:rotateZ(-45deg);transform:rotateZ(-45deg)}
        .tagsinput div{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}
        .tagsinput div input{background:0 0;display:block;width:100%;font-size:14px;line-height:20px;padding:5px;border:0;margin:0 5px 5px 0}
        .tagsinput div input.error{color:#ff6b6b}
        .tagsinput div input::-ms-clear{display:none}
        .tagsinput div input::-webkit-input-placeholder{color:#ccc;opacity:1}
        .tagsinput div input:-moz-placeholder{color:#ccc;opacity:1}
        .tagsinput div input::-moz-placeholder{color:#ccc;opacity:1}
        .tagsinput div input:-ms-input-placeholder{color:#ccc;opacity:1}

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.admin._header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin._aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.admin._footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('assets/admin/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/admin/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/admin/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>

@yield('script')
</body>
</html>
