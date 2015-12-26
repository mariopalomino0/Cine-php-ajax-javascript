<?php
include('../conexion.php');
if(isset($_GET['idsesion']) && isset($_GET['dia'])  && isset($_GET['idpeliculas']) )
{
	$idsesion= $_GET['idsesion'];echo "<br />";
	$fecha = $_GET['dia'];echo "<br />";
	$idpeliculas= $_GET['idpeliculas'];echo"</br>";


	$consulta = ("select * from reservas  where   fecha = '$fecha' and idpeliculas = '$idpeliculas' ");echo"</br>";
	$result = mysql_query($consulta) or die(mysql_error());
	if(mysql_num_rows($result) != 0)
	{
		echo"<script type='text/javascript'>
		alert('No puede eliminar este dia tiene reservas.');
		window.location='../administrador/sesiones_formulario.php';
		</script>";
	}
	else
	{
		
		$eliminar = ("delete from sesiones where diainicio = '$fecha' and diafin = '$fecha' ");
		$resulteliminar = mysql_query($eliminar) or die(mysql_error());
		echo"<script type='text/javascript'>
		alert('Dia ".$fecha." eliminado.');
		window.location='../administrador/sesiones_formulario.php';
		</script>";
		
	}
}
?>