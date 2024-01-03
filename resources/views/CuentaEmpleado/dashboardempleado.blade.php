@extends('layouts.masterMenuView')
@section('section')
        <!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        ul.social-network {
            list-style: none;
            display: inline;
            margin-left:0 !important;
            padding: 0;
        }
        ul.social-network li {
            display: inline;
            margin: 0 5px;
        }
        .social-network a.icoRss:hover {
            background-color: #348fe2;
        }
        .social-network a.icoRss:hover i, a.icoGoogle:hover i{
            color:#fff;
        }
        .social-network a.icoGoogle:hover {
            background-color: #BD3518;
        }
        a.socialIcon:hover, .socialHoverClass {
            color:#44BCDD;
        }
        .social-circle li a {
            display:inline-block;
            position:relative;
            margin:0 auto 0 auto;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;
            text-align:center;
            width: 6.5em;
            height: 6.5em;
            font-size:10px;
            background-color: #D8D8D8;
        }
        .social-circle li i {
            margin:0;
            line-height:3em;
            text-align: center;
        }
        .social-circle li a:hover i, .triggeredHover {
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -ms--transform: rotate(360deg);
            transform: rotate(360deg);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            -ms-transition: all 0.2s;
            transition: all 0.2s;
        }
        .social-circle i {
            color: #3a3a3a;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }
        .jumbotron{
            padding-top: 12px;
            padding-bottom:0px;
            height:100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        #em{
            padding-left: 30px;
        }
        .col-md-2{
            width: auto;
            padding-left: 30px;
        }


    </style>
</head>
<body>
<div class="content">
    <ol class="breadcrumb ">
        <li><a href="javascript:;">Inicio</a></li>
    </ol>
    <h1 class="page-header text-center">Bienvenido</h1>

    <div class="panel panel-inverse" data-sortable-id="ui-widget-14">
        <div class="panel-heading">
            <div class="panel-heading-btn"> 
            </div>
        </div>
        <div class="panel-body"> 
        <input type="hidden" name="nombreEmpresa" id="nombreEmpresa" value="{{ $empresa }}">
            <div class="profile-section">
                <div class="profile-left">
                    <div class="profile-image">
                        <?php echo '<img class="avatar border-white" src="' . $uri . '" style="width:200px; height:200px; float:left;  margin-right:25px;"  />'; ?>
                        <i class="fa fa-user hide"></i>
                    </div>
                </div>

                <div class="profile-right">
                    <div class="profile-info">
                        <div class="table-responsive">
                            <table class="table table-profile">
                                <thead>
                                    <tr>
                                        <th>
                                            <h4>Bienvenido {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}</h4>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h5 style="text-align:center">Queremos que tu experiencia con nosotros sea agradable y duradera.</h5>
            <br>
        </div>
    </div>
</div>
</body>
</html>
@endsection
@section('js-base')
    @include('librerias.base.base-begin')
    @include('librerias.base.base-begin-page')
    <script type="text/javascript">
        var empN=$("#nombreEmpresa").val();
        $("#empnombre").html(empN);

        $.ajaxSetup({
    
            headers: {
    
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
            }
    
        });
    
       
    
        $(".btn-submit").click(function(e){
    
      
    
            e.preventDefault();
    
       
    
            var name = $("input[name=name]").val();
    
            var password = $("input[name=password]").val();
    
            var email = $("input[name=email]").val();
    
       
    
            $.ajax({
    
               type:'POST',
    
               url:'/ajaxRequest',
    
               data:{name:name, password:password, email:email},
    
               success:function(data){
    
                  alert(data.success);
    
               }
    
            });
    
      
    
        });
    
    </script>
    
       
    
    </html>
   
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! Html::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}
    {!! Html::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
    {!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
    {!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}npm run dev
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
    {!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}
    {!! Html::script('assets/js/sweetalert.min.js') !!}
    {!! Html::script('assets/js/jquery.numeric.min.js') !!}
@endsection