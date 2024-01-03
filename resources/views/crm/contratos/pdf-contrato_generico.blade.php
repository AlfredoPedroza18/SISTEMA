<?php

header('Content-Type:application/msword');
header('Content-Type: text/html; charset=utf-8');
header('Content-Disposition: attachment;filename="Contrato de servicios.doc"');
header('Pragma:no-cache');
header('Expires: 0');
?>

{!!  utf8_decode($datos_contrato) !!}
//dd( $datos_contrato );
//echo html_entity_decode($datos_contrato, ENT_COMPAT, 'UTF-8');

/*foreach($datos_contrato as $index=>$contrato)
{
	$contenido=$contrato->contenido;

 echo html_entity_decode($contenido, ENT_COMPAT, 'UTF-8');
}*/

?>