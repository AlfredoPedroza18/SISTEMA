alert('cotizador');

var servicio_rys = {


        init:function(){
        /******************************************************************************************/
        /******************************** PUESTO REQUERIDO ****************************************/
        /******************************************************************************************/

            $('#puesto_requerido_rys').blur(function(){
                var tipo_puesto = $.trim((this.value).toLowerCase());

                if(tipo_puesto=='especial'){
                    $('#porcentaje_rys').removeAttr('disabled');
                }else{
                    $('#porcentaje_rys').attr('disabled','disabled');
                }
            });


        /******************************************************************************************/
        /******************************************************************************************/
        /******************************************************************************************/

            $('#sueldo_mensual_rys').blur(function(){

                
                var numero_vacantes_rys     = $('#num_vacates_rys').val();
                var puesto_requerido_rys    = $.trim($('#puesto_requerido_rys').val()).toLowerCase(); 
                var sueldo_mensual_rys      = this.value; 
                var porcentaje              = 0.00;
                var subtotal                = 0.00;
                var iva                     = 0.00;
                var total                   = 0.00;

                
                
                if(numero_vacantes_rys<=0){            
                    $('#num_vacates_rys').focus();
                    swal('¡ Debe de asignar un número válido de vacantes !','','warning');
                }

                if(puesto_requerido_rys != 'especial'){            
                    $.ajax({
                        url: '{{ url('genera_costo_rys') }}',
                        type:'GET',
                        dataType: 'json',
                        data:{numero_vacantes_rys:numero_vacantes_rys},
                        success:function(response){
                            porcentaje = (response.porcentaje/100);
                            subtotal   = (sueldo_mensual_rys*porcentaje)*numero_vacantes_rys;
                            iva        = (subtotal*0.16);
                            total      = subtotal + iva;
                            $('#porcentaje_rys').val(response.porcentaje);
                            $('#propuesta_economica_precio_rys').html(subtotal.toFixed(2));
                            $('#iva_precio_rys').html(iva.toFixed(2));                    
                            $('#servicio_total_rys').html(total.toFixed(2));

                            $('#total_rys').val(total.toFixed(2));
                            $('#iva_rys').val(iva.toFixed(2));
                            $('#propuesta_econonimca_rys').val(subtotal.toFixed(2));

                            


                        },
                        error : function(jqXHR, status, error) {
                                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                        }
                    });
                }

                if(puesto_requerido_rys == 'especial'){
                    $('#porcentaje_rys').removeAttr('disabled');
                }
                
            });



            $('#porcentaje_rys').blur(function(){

                if(this.value == 0){
                    $(this).focus();
                    swal('¡ Debe colocar un porcentaje !','','warning');
                }else{
                    var numero_vacantes_rys     = $('#num_vacates_rys').val();
                    var puesto_requerido_rys    = $.trim($('#puesto_requerido_rys').val()).toLowerCase(); 
                    var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
                    var porcentaje              = (this.value/100);
                    var subtotal                = (sueldo_mensual_rys*porcentaje)*numero_vacantes_rys;;
                    var iva                     = (subtotal*0.16);
                    var total                   = subtotal + iva;


                    //$('#porcentaje_rys').val(response.porcentaje);
                    $('#propuesta_economica_precio_rys').html(subtotal.toFixed(2));
                    $('#iva_precio_rys').html(iva.toFixed(2));                    
                    $('#servicio_total_rys').html(total.toFixed(2));

                    $('#total_rys').val(total.toFixed(2));
                    $('#iva_rys').val(iva.toFixed(2));
                    $('#propuesta_econonimca_rys').val(subtotal.toFixed(2));
                }
            });



            $('#num_vacates_rys').blur(function(){
                
                var numero_vacantes_rys     = this.value;
                var puesto_requerido_rys    = $.trim($('#puesto_requerido_rys').val()).toLowerCase(); 
                var sueldo_mensual_rys      = $('#sueldo_mensual_rys').val();
                var porcentaje              = 0.00;
                var subtotal                = 0.00;
                var iva                     = 0.00;
                var total                   = 0.00;


                if( (sueldo_mensual_rys != 0 ) && (numero_vacantes_rys != 0 ) ){
                     $.ajax({
                        url: '{{ url('genera_costo_rys') }}',
                        type:'GET',
                        dataType: 'json',
                        data:{numero_vacantes_rys:numero_vacantes_rys},
                        success:function(response){
                            porcentaje = (response.porcentaje/100);
                            subtotal   = (sueldo_mensual_rys*porcentaje)*numero_vacantes_rys;
                            iva        = (subtotal*0.16);
                            total      = subtotal + iva;
                            $('#porcentaje_rys').val(response.porcentaje);
                            $('#propuesta_economica_precio_rys').html(subtotal.toFixed(2));
                            $('#iva_precio_rys').html(iva.toFixed(2));                    
                            $('#servicio_total_rys').html(total.toFixed(2));

                            $('#total_rys').val(total.toFixed(2));
                            $('#iva_rys').val(iva.toFixed(2));
                            $('#propuesta_econonimca_rys').val(subtotal.toFixed(2));

                            


                        },
                        error : function(jqXHR, status, error) {
                                    swal('Disculpe, existió un problema comuniquese con el equipo de desarrollo');
                        }
                    });
                }

            });
        }
}