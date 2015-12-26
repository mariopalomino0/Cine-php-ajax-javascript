<?php
if( isset($_GET['idusuario']) && isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['anio']) && isset($_GET['genero']) && isset($_GET['login']) && isset($_GET['password1']) && isset($_GET['password2']) && isset($_GET['poblacion']) && isset($_GET['tipo']))
{
	$idusuario = $_GET['idusuario'];
	$nombre=$_GET['nombre'];
	$apellido=$_GET['apellido'];
	 $anio=$_GET['anio'];
	 $genero=$_GET['genero'];
	 $login=$_GET['login'];
	$password=$_GET['password1'];
	$poblacion=$_GET['poblacion'];
	$tipo = $_GET['tipo'];
}
else
{
	exit();
}

include('../conexion.php');

$update = ( "update usuario set nombre = '$nombre' , apellido = '$apellido' , anio = '$anio' , genero = '$genero' ,login = '$login' , password = '$password' , poblacion = '$poblacion' , useradmin = '$tipo' where idusuario = '$idusuario'") ;
$resultado = mysql_query($update) or die (mysql_error());
echo"<script type='text/javascript'>
        alert('Se ingresaron los datos correctamente.');
        window.location='usuarios.php';
        </script>";

?>
