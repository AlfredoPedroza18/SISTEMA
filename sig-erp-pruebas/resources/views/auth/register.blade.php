@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="jumbotron">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Registrar Usuario &nbsp;&nbsp;&nbsp;<i class="fa fa-2x fa-btn fa-user"></i></center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('idcn') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Selecciona CN:</label>

                            <div class="col-md-6 col-xs-12">
                               <!-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">-->
                                <select class="js-example-basic-multiple-limit default-select2 form-control input-lg','data-live-search" data-style="btn-white" name="idcn" id="idcn">
                                        <option value='-1'>Selecciona un CN...</option>
                                        @foreach($listaCN as $key=>$valor)
                                        <option  value='{{$valor->id}}' id='{{$valor->id}}'>{{ $valor->nombre.' '.$valor->nomenclatura}}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('idcn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idcn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre:</label>

                            <div class="col-md-6 col-xs-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Usuario:</label>

                            <div class="col-md-6 col-xs-12">
                                <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de E-Mail</label>

                            <div class="col-md-6 col-xs-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6 col-xs-12">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6 col-xs-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 col-xs-12">
                                <center><button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- div class row -->
    <div class="row ">
       <div class="col-md-12 col-xs-12 text-center">
            <img src="assets/img/login-bg/GenTLogo.png" data-id="login-cover-image" alt="" class="logo-principal img-responsive" />
        </div>
     </div>
  </div>  
</div>
@endsection
