<?php

$servidor = "localhost"; //el servidor que utilizaremos, en mataroin
$usuario = "root"; //El usuario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que utilizaremos
$BD = "a9704078_cine"; //El nombre de la base de datos


/*Aquí abrimos la conexión en el servidor.*/

$conexion = @mysql_connect($servidor, $usuario, $contraseña);
 
/* Aquí preguntamos si la conexión no pudo realizarse, de ser así lanza un mensaje en la pantalla con el siguiente texto "No pudo conectarse:"
y le agrega el error ocurrido con "mysql_error()"
*/
if(!$conexion)
{
	die('<strong>No pudo conectarse:</strong> ' . mysql_error());
}
else
{
	//echo 'Conectado  satisfactoriamente al servidor <br />';
}
mysql_select_db($BD, $conexion) or die(mysql_error($conexion));


?>