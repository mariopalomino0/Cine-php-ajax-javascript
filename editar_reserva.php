<?php
session_start();
include('conexion.php');
if(isset($_GET['butaca']) && isset($_GET['idpeliculas']) &&  isset($_GET['datepicker']) && isset($_GET['hora']) && isset($_GET['idreservas']))
{
	$butaca = $_GET['butaca'];
	$idpeliculas =$_GET['idpeliculas']; 
	$dia = date('Y-m-d', strtotime($_GET['datepicker'])); 
	$hora = $_GET['hora'];
	$idreservas = $_GET['idreservas']; 
}

$consulta =("SELECT * from reservas  WHERE butaca ='$butaca' and idpeliculas = '$idpeliculas' and hora = '$hora' and fecha = '$dia'  ");
$resultado = mysql_query($consulta) or die (mysql_error());
if(mysql_num_rows($resultado)  == 0 )
{
	echo $query = "update reservas set  fecha='$dia',butaca='$butaca', hora='$hora' where idreservas = '".trim($idreservas)."' "; 
	$update = mysql_query($query) or die (mysql_error());
	echo"<script type='text/javascript'>
	alert('Se ingresaron los datos correctamente.');
	window.location='mi_reserva.php';
	</script>";
}
else
{
	echo"<script type='text/javascript'>
	alert('Este reserva no esta disponible.');
	window.location='mi_reserva.php';
	</script>";
}
?>