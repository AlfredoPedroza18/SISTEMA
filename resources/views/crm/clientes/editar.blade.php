@extends('layouts.masterMenuView')
@section('section')

<div class="content">
{!! Form::open(['route' => 'sig-erp-crm::clientes.store']) !!}
	{{ Form::text('email', '',['placeholder' => 'KLAJSJLKAJSAJ','id' => 'nameee' ]) }}
	
{!! Form::close() !!}


@endsection

@section('js-base')
	@include('librerias.base.base-begin')
	@include('librerias.base.base-begin-page')


	


	
	<script>
		$(document).ready(function() {
			App.init();

		   //TableManageButtons.init();
		  TableManageCombine.init();
		  	$.ajax({
				headers: {'X-CSRF-TOKEN':token},
				url: ruta,									
				type: 'GET',
				dataType: 'json',
				succes: function(response){     
							alert("¡ Registro eliminado !" );   
							$('#nameee').val(response.nombre);
						},
				error : function(jqXHR, status, error) {

				            swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
				        }
			});
		});
	</script>
@endsection



