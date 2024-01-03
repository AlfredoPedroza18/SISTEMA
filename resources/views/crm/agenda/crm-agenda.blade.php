@extends('layouts.masterMenuView')
@section('section')
<div id="content" class="content">

   <ol class="breadcrumb ">
	    <li><a href="{{url('dashboard')}}">CRM</a></li>
		<li>Agenda</li>
   </ol>
<h1 class="page-header text-center">AGENDA</h1>
	

	<!-- begin panel -->
			<div class="panel panel-inverse">
			    <div class="panel-heading">
			        <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			        </div>

			        <h4 class="panel-title">Agenda</h4>
			        
			    </div>
			    <div class="panel-body p-0">
			     <div class="vertical-box">
			    	 <div class="vertical-box-column p-15 bg-silver width-250">
                      	<div id="external-events" class="fc-event-list">
                      	  @permission('agenda.cancelar')
                      	  <a href="#modal-event" class="btn btn-inverse m-r-5 m-b-5" data-toggle="modal-event" id="eventos-cancel">	<i class="fa fa-1x fa-times-circle"></i>&nbsp;Cancelar Evento
                      	  </a>
                      	  @endpermission
                      	  <p>
                      	 <div class="panel panel-inverse" data-sortable-id="index-10">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Calendario</h4>
						</div>

						<div class="panel-body">
							<div id="datepicker-inline" class="datepicker-full-width"><div></div></div>
						</div>
					</div>
					 	</div>
					 	<!--<input type='checkbox' id='drop-remove' />
				   <label for='drop-remove'>remove after drop</label>-->
			   </div>
			    <div id='calendar' class="vertical-box-column p-15 calendar"></div>
			    </div>
			</div>
		  </div>
			<!-- end panel -->
			<style type="text/css">
			    .mod{z-index:20000 !important}
				.ti{z-index:20000 !important}
				.ti1{z-index:30000 !important}
				.date{z-index:10000 !important}
			</style>

<!-- #modal-message -->
							<div class="modal fade mod" id="modal-message">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
											<h3 class="modal-title"><center><i class="fa fa-1x fa-calendar-o"></i>&nbsp;Evento <small id="dia"> </small></center></h3>
										</div>
										<div class="modal-body">
										    <form method="POST" id="form-alta-agenda">
										    <div class="row">
										       <div class="error"></div>
										       <div class="error1"></div>
										       <div class="error2"></div>
										       <div class="error3"></div>
										       <div class="error4"></div>
										       <div class="error5"></div>
										    </div>
											     <div class="form-group">
	              									<label for="recipient-name" class="form-control-label">Evento:</label>
	              									<input type="text" class="form-control" id="evento" name="evento" maxlength="255">
           										 </div>
           										 <div class="row"><!-- begin row -->
										                <!-- begin col-1 -->
										                <div class="col-md-3">
										                	<label for="recipient-name" class="form-control-label">Hora Inicio:</label>
										                	 <div class="input-group bootstrap-timepicker timepicker ti1">
													            <input id="hora_inicio" name="hora_inicio" type="text" class="form-control input-small time ti1" >
													            <span class="input-group-addon"><i class="glyphicon glyphicon-time"   ></i></span>
													        </div>
	              									        <!-- <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" max="22:30:00" value="" step="1">-->
										                </div><!-- end col -->
										                 <!-- begin col-2 -->
										                <div class="col-md-3">
										                	<label for="recipient-name" class="form-control-label">Hora Fin:</label>
										                	 <div class="input-group bootstrap-timepicker timepicker ti">
													            <input id="hora_fin" name="hora_fin" type="text" class="form-control input-small time ti">
													            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
													        </div>
	              									        <!-- <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" max="22:30:00" value="" step="1">-->
										                </div>
										                <div class="col-md-6>
										                	<label for="recipient-name" class="form-control-label">Fecha Fin:</label>
										                	 <div class="input-group date date " id="datepicker-disabled-past" data-date-format="dd-mm-yyyy" data-date-start-date="Date.default" enableOnReadonly="true">
                                                             <input type="text" class="form-control date" placeholder="Fecha fin del evento" id="fecha_fin" name="fecha_fin"/>
                                                               <span class="input-group-addon add-on "><i class="fa fa-calendar"></i></span>
                                                            </div>
	              									        <!-- <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" max="22:30:00" value="" step="1">-->

	              									        <input type="hidden" class="form-control" id="fecha_inicio" name="fecha_inicio">
	              									        <input type="hidden" class="form-control" id="ocurrencia_evento" name="ocurrencia_evento">
	              									        <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="{{ Auth::user()->id }}">
										                </div>
										         </div><!-- end row -->
											</form>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white btn-sm" data-dismiss="modal" id="close">Cerrar</a>
											<a href="javascript:;" class="btn btn-success btn-sm" id="guardar-evento">Guardar Evento</a>
										</div>
									</div>
								</div>
							</div>
<!-------------------------  modal eventos           -------------------->
<div class="modal fade mod" id="modal-event">
								<div class="modal-dialog  modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
											<h3 class="modal-title"><center><i class="fa fa-1x fa-calendar-o"></i>&nbsp;Eventos</center></h3>
										</div>
										<div class="modal-body">
										   <div class="row" >
										   <div class="col-md-1" >
										   </div>
										   <div class="col-md-10" >
											
												 <table id="data-table" class="table table-striped table-bordered">
												   <thead>
				                             	    <tr>
				                             	    	<th class="text-center">Evento</th>
				                             	    	<th class="text-center">Fecha Evento</th>
				                             	    	<th class="text-center">DROP</th>
				                             	    </tr>
				                             	    </thead>
				                             	    <tbody>
				                             	     <form  id="form-cancelar-evento">
				                             	     @foreach($agendaList as $clave)
				                             	      <tr>

				                             	      	 <td> {{$clave->evento}}</td>
				                             	      	 <td width="30%" class="text-center"> {{$clave->start}} a {{$clave->end}}</td>
				                             	      	 <td width="20%" class="text-center"> 
				                             	      	 <!--<input type="checkbox" id="{{ $clave->ideve }}" value="{{ $clave->ideve }}" name="cancel[]">-->
				                             	      	 <button class="button" id="eliminar" onclick="cancelarEvento({{ $clave->ideve }})">Eliminar Evento</button>

				                             	      	 </td>
				                             	      </tr>
				                             	    @endforeach
				                             	  
				                             	    </form>
				                             	    </tbody>
												 </table>
										  </div>
										  <div class="col-md-1" >
										   </div>
										 </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-default btn-sm" data-dismiss="modal" id="close">Cerrar</a>
											
										</div>
									</div>
								</div>
							</div>
<!-- en modal eventos------------------------------------------------------ -->
	</div><!-- end div content-->


@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')
 {!! Html::script('assets/js/sweetalert.min.js') !!}
 {!! Html::script('assets/plugins/fullcalendar/lib/moment.min.js') !!}
 {!! Html::script('assets/plugins/fullcalendar/fullcalendar.min.js') !!}
 {!! Html::script('assets/plugins/fullcalendar/es.js') !!}
 {!! Html::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') !!}

 {!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}
	{!! Html::script('assets/js/table-manage-combine.demo.min.js') !!}

 

<script type="text/javascript">
	/* initialize the external events
		-----------------------------------------------------------------*/
$(document).ready(function(){
 TableManageCombine.init();


	
$('.time').timepicker(
     {  showMeridian: false,
        showSeconds:true   

    }
	);
$('#datepicker-disabled-past').datepicker({
	format: "yyyy-mm-dd",
	language: "es",
	autoclose: true,
	todayBtn: true
});



	


		/* initialize the calendar
		-----------------------------------------------------------------*/
   var factual=null;
   var fecha_inicio=null;
   var ocurrencia_evento=null;
		$('#calendar').fullCalendar({

			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			allDaySlot:false,
			lang:'es',
			editable: true,
			navLinks: true, // can click day/week names to navigate views
			selectable: true,
			selectHelper: true,
//---------------------------obtiene el dia al que le estas dando clic al calendario  ----------------------------//

		dayClick: function(date, jsEvent, view) {
                  fecha_inicio=date.format();
                    $("#dia").html("<samall>"+date.format()+"</small>");
                     $("#ocurrencia_evento").val(view.name);

                    var fecha_actual=new Date();
                    var año= fecha_actual.getFullYear();
                    var mes= fecha_actual.getMonth()+1;
                    var dia= fecha_actual.getDate();
                    factual=año+"-"+mes+"-"+dia;
                
                    if(view.name=='month'){
                    	ocurrencia_evento=view.name;
                    $("#hora_inicio").removeAttr("readonly","readonly");
                      fecha_inicio=date.format();
                    $("#fecha_inicio").val(date.format());
                    $("#ocurrencia_evento").val(view.name);
                    }
                    if(view.name=='agendaWeek'){
                        	ocurrencia_evento=view.name;
                         $("#hora_inicio").attr("readonly","readonly");
                          fecha_inicio=date.format();
                    	 var fe_ini=fecha_inicio.split("T");
                    	 $("#fecha_inicio").val(fe_ini[0]);
                         $("#hora_inicio").val(fe_ini[1]);
                         
                    	}
                    if(view.name=='agendaDay'){

                    		ocurrencia_evento=view.name;
                    	 $("#hora_inicio").attr("readonly","readonly");
                    	  fecha_inicio=date.format();
                    	 var fe_ini=fecha_inicio.split("T");
                    	  $("#fecha_inicio").val(fe_ini[0]);
                          $("#hora_inicio").val(fe_ini[1]);
                     


                    	}
			       // alert('Clicked on: ' + date.format());

			        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

			       // alert('Current view: ' + view.name);

    				},
//---------------------------end obtiene el dia al que le estas dando clic al calendario  ----------------------------//
//---------------------------genera el evento a mostrar en el calendario  -------------------------------------------//		
			select: function(start, end) {
			if(ocurrencia_evento=='month')
				$('#modal-message').modal({
					keyboard: false,
					backdrop:'static',
					show:true
				});
                   
				var title = '';
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
//---------------------------end genera el evento dado de alta y lo muestra en el calendario  ------------------------------//
//---------------------------Visualiza los eventos obtenidos de la bd's cpn un jason ------------------------------//
            eventLimit: true, // allow "more" link when too many events
			events: getListaEventos(),
		
//---------------------------end Visualiza los eventos obtenidos de la bd's cpn un jason ------------------------------//
			droppable: true, // this allows things to be dropped onto the calendar

			
			drop: function() {
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			}
		});

$("#guardar-evento").click(function(e){
	e.preventDefault();
	var bandera=1;
	if($("#evento").val()==''){
		bandera=0;
		$('.error').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de ingresar un <strong>Evento</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error').fadeIn("slow");
        $('.error').fadeOut(9000);
        $('#evento').attr('style','border-color: #ff5b57');
	}
	if($("#hora_inicio").val()==''){
		bandera=0;
		$('.error1').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de indicar la <strong>Hora inicio</strong> del evento.<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error1').fadeIn("slow");
        $('.error1').fadeOut(9000);
        $('#hora_inicio').attr('style','border-color: #ff5b57');
	}
	if($("#hora_fin").val()==''){
		bandera=0;
		$('.error2').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de indicar la <strong>Hora fin </strong> del evento.<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error2').fadeIn("slow");
        $('.error2').fadeOut(9000);
        $('#hora_fin').attr('style','border-color: #ff5b57');
	
	}
	if($("#fecha_fin").val()==''){
		bandera=0;
		$('.error3').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  Favor de indicar la <strong>Fecha fin </strong> del evento.<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error3').fadeIn("slow");
        $('.error3').fadeOut(9000);
        $('#fecha_fin').attr('style','border-color: #ff5b57');
		
	}
        ms = Date.parse(factual);
        fechaact = new Date(ms);
        fecha_ini1=fecha_inicio.replace("-","/");
        ms1=Date.parse(fecha_ini1);
        fecha_ini=new Date(ms1);
        var fechafin=$("#fecha_fin").val().replace("-","/");
        var parfecha_fin=Date.parse(fechafin);
        var fecha_final=new Date(parfecha_fin);
       

     if(fecha_final<fecha_ini){
     	//alert("fecha final:"+fecha_final+" fecha_inicial;"+fecha_inicio);
     	bandera=0;
     	  $('.error4').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  <strong>No puede agendar un evento donde la fecha fin sea anterior a la fecha inicial.</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error4').fadeIn("slow");
        $('.error4').fadeOut(9000);
     }   
    
	if(fecha_ini<fechaact){
		bandera=0;
		$('.error4').empty();
		$('.error4').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  <strong>No puede agendar un evento con  fecha anterior a la actual.</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error4').fadeIn("slow");
        $('.error4').fadeOut(9000);
		
	}
	if($("#hora_fin").val()<$("#hora_inicio").val()){
		bandera=0;
		$('.error5').html("<div class='alert alert-danger fade in m-b-15'><center><span class='label label-danger'>Error!</span></strong>  <strong>No puede ingresar una Hora fin menor a la Hora de inicio</strong> .<span class='close' data-dismiss='alert'>×</span></center></div>");
        $('.error5').fadeIn("slow");
        $('.error5').fadeOut(9000);
		
	}

    if(bandera){
	         guardarCliente();
	         setTimeout(function(){
	 	           location.reload('{{ url('agenda') }}');
	 	     },1000);
	 }

	  $("input[style*='border-color: #ff5b57']").keypress(function(){
      var name=this.name;
      $("#"+name).removeAttr('style','border-color: #ff5b57');
        //$('#nombre_comercial').removeAttr('style','border-color: #ff5b57');
      });

      $("#fecha_fin").click(function(){
      		 $("#fecha_fin").removeAttr('style','border-color: #ff5b57');
      });

});

$("#close").click(function(){
	limpiarInput();

});


/*$("#cancelar_evento").click(function(e){//cancelar un evento
   e.preventDefault();
   cancelarEvento();
    setTimeout(function(){
	 	           location.reload('{{ url('agenda') }}');
	 	     },1000);
});*/
$("#eventos-cancel").click(function(){

$('#modal-event').modal({
					keyboard: false,
					backdrop:'static',
					show:true
				});
});





});//end document ready

var guardarCliente = function(){
        var datos = $("#form-alta-agenda").serialize();
        var token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('agenda') }}',
            type:'POST',
            dataType: 'json',
            data: datos,
            success: function(response){ 

                   swal(''+response.status_alta);
                    if(response.status_alta == 'success'){
                        swal({                                  
                                title: "<h3>¡ El registro se guardo con éxito !</h3> ",
                                html: true,
                                data: datos,
                                type: "success" 
                                                                               
                            });
                        limpiarInput()
                        $('#modal-message').modal('hide');
                    }else if(response.status_alta == 'wrong'){
                        swal({   
                                title: "<h3>¡ El registro NO se guardo con éxito !</h3> ",
                                html: true,
                                type: "warning",   
                                confirmButtonText: "OK"                                                 
                            });
                    }

                    //setTimeout(function(){     location.reload();   }, 1000);
                },
            error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo1');
            }
        });
        
    }

    var limpiarInput=function(){

    	/* $('input').each(function(){	
			                       $($(this)).val('');
   						  });*/
    	  $("#evento").val('');
    	  $("#fecha_inicio").val(''); 
    	  $("#fecha_fin").val(''); 
    	  $("#ocurrencia_evento").val('');
    	  
    }
     var getListaEventos=function(){

     	var iduser=$("#id_usuario").val();
     	var result=null;
         $.ajax({
             url:'{{ url('agendaListado') }}',
             type:'GET',
             dataType: 'json',
             async:false,
             data:{'iduser':iduser},
             success:function(data){
             
             	//console.log(data);
                  result=data ;
             },
             error:function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo2');
            }

         });
         return result;
     	
     }
  
     var cancelarEvento=function(id){
          
     /*  var checkboxValues = new Array();
       var valores=[];
       //recorremos todos los checkbox seleccionados con .each
      $('input[name="cancel[]"]:checked').each(function() {
	     //$(this).val() es el valor del checkbox correspondiente
	    checkboxValues.push($(this).val());
	     valores+=this.value+",";
	     
	     
    });
   
   
      $("#valores-id").val(valores);]*/

  
         
         var token= $('meta[name="csrf-token"]').attr('content');

      $.ajax({
            headers: {'X-CSRF-TOKEN':token},
            url:'{{ url('agenda') }}'+"/"+id,
            type:'PUT',
            dataType: 'json',
            success: function(response){ 

                   console.log(response);
                    if(response.status_alta == 'success'){
                        swal({                                  
                                title: "<h3>¡ El evento se cancelo con éxito !</h3> ",
                                html: true,
                                 type: "success",   
                                confirmButtonText: "OK"                                                 
                            });
                    }else if(response.status_alta == 'wrong'){
                        swal({   
                                title: "<h3>¡ Favor de seleccionar un evento para cancelar !</h3> ",
                                html: true,
                                type: "warning",   
                                confirmButtonText: "OK"                                                 
                            });
                    }

                    setTimeout(function(){     location.reload();   }, 1000);
                },
            error : function(jqXHR, status, error) {

                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo3'+error);
            }
        });

     }
   
</script>


@endsection