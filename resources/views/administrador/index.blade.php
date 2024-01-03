@extends('layouts.masterMenuView')
	<style type="text/css">
		

		/*=========================
		  Icons
		 ================= */

		/* footer social icons */
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


		/* footer social icons */
		.social-network a.icoRss:hover {
			background-color: #F56505;
		}
		.social-network a.icoFacebook:hover {
			background-color:#3B5998;
		}
		.social-network a.icoTwitter:hover {
			background-color:#33ccff;
		}
		.social-network a.icoGoogle:hover {
			background-color:#BD3518;
		}
		.social-network a.icoVimeo:hover {
			background-color:#0590B8;
		}
		.social-network a.icoLinkedin:hover {
			background-color:#007bb7;
		}
		.social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
		.social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoLinkedin:hover i {
			color:#fff;
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
			font-size:20px;
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
			color: #fff;
			-webkit-transition: all 0.8s;
			-moz-transition: all 0.8s;
			-o-transition: all 0.8s;
			-ms-transition: all 0.8s;
			transition: all 0.8s;
		}

		a {
		 background-color: #D3D3D3;   
		}
	</style>
@section('section')
	<div id="content" class="content">
		

		
		<div class="row">		
			@include('administrador.top-menu')
		</div>


	</div>

@endsection
@section('js-base')
@include('librerias.base.base-begin')

@include('librerias.base.base-begin-page')