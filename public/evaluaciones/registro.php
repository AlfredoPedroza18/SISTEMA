<?php
$db_host="localhost";
$db_user="nombre_de_usuario";
$db_password="contraseña";
$db_name="nombre_de_base_de_datos";
$db_table_name="nombre_de_tabla";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
$subs_r1 = utf8_decode($_POST['nombre']);
$subs_r2 = utf8_decode($_POST['nombre']);
$subs_r3 = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_name = utf8_decode($_POST['nombre']);
$subs_na = utf8_decode($_POST['nombre']);
$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

<form name="enviar" action="index.php" method="post">
      <select name="opciones[]" multiple="multiple">
         <option>val 1</option>
         <option>val 2</option>
         <option>val 3</option>
         <option>val 4</option>
      </select>

      <button type="submit">Enviar</button>
   </form>
   
if (mysql_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');

}

mysql_close($db_connection);

		
?>