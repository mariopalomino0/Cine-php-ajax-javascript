<?php
session_start();

$butacas = $_GET['butaca'];
$idpeliculas=$_GET['idpeliculas'];
$dia=$_GET['dia'];
$hora = $_GET['hora'];
$idusuario = $_GET['idusuario'];

include('conexion.php');

foreach($butacas as $butaca)
{
	$consulta =("SELECT * from reservas  WHERE butaca ='$butaca' and idpeliculas = '$idpeliculas' and hora = '$hora' and fecha = '$dia' and idusuario = '$idusuario' ");
 	$resultado = mysql_query($consulta) or die (mysql_error());
	if(mysql_num_rows($resultado)  == 0 )
	{
		$insert = mysql_query("INSERT INTO reservas (butaca,idpeliculas,hora,fecha,idusuario)  values('$butaca','$idpeliculas','$hora','$dia','$idusuario')"); 
		echo"<script type='text/javascript'>
		alert('Se ingresaron los datos correctamente.');
		window.location='reservar_pelicula.php';
		</script>";
	}
	else
	{
		exit();
	}
}
?>
