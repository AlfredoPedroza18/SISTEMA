<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/extra_404_error.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:45:21 GMT -->
<head>
    <meta charset="utf-8" />
    <title>SIG-ERP-Gen-T | 404 Error Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    {!! Html::style('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') !!}
    {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/animate.min.css') !!}
    {!! Html::style('assets/css/style.min.css') !!}
    {!! Html::style('assets/css/style-responsive.min.css') !!}
    {!! Html::style('assets/css/theme/default.css" rel="sty') !!}
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin error -->
        <div class="error">
            <div class="error-code m-b-10">404 <i class="fa fa-warning"></i></div>
            <div class="error-content">
                <div class="error-message">Disculpe no se encontro el recurso...</div>
                <div class="error-desc m-b-20">
                    El recurso solicitado no fue encontrado favor de regresar la página <br />
                    
                </div>
                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-success">Regresar a la página</a>
                </div>
            </div>
        </div>
        <!-- end error -->
        
        
        
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    {!! Html::script('assets/plugins/jquery/jquery-1.9.1.min.js') !!}
    {!! Html::script('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') !!}
    {!! Html::script('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') !!}
    {!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    {!! Html::script('assets/plugins/slimscroll/jquery.slimscroll.min.js') !!}
    {!! Html::script('assets/plugins/jquery-cookie/jquery.cookie.js') !!}
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! Html::script('assets/js/apps.min.js') !!}
    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

</body>

<!-- Mirrored from seantheme.com/color-admin-v2.0/admin/html/extra_404_error.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Sep 2016 14:45:21 GMT -->
</html>
