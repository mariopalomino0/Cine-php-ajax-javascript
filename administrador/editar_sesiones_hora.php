<?php
include('../conexion.php');
if(isset($_GET['idsesion']) && isset($_GET['dia']) && isset($_GET['hora']) && isset($_GET['idpeliculas']) )
{
	$idsesion= $_GET['idsesion'];
	$fecha = $_GET['dia'];
	$hora= $_GET['hora'];
	$idpeliculas= $_GET['idpeliculas'];echo"</br>";

$consulta = ("select * from reservas  where hora = '$hora' and  fecha = '$fecha' and idpeliculas = '$idpeliculas' ");echo"</br>";
$result = mysql_query($consulta) or die(mysql_error());
if(mysql_num_rows($result) > 0)
{
	echo"<script type='text/javascript'>
	alert('No puede eliminar esta hora tiene reservas.');
	window.location='../administrador/sesiones_formulario.php';
	</script>";
}
else
{
	$consultados = ("select *,MAX(diafin) as diafin, MIN(diainicio) as diainicio from sesiones where hora = '$hora' and  idpeliculas = '$idpeliculas' group by idpeliculas ");echo"</br>";
	$resultdos = mysql_query($consultados) or die(mysql_error());
	$data = mysql_fetch_array($resultdos);

	$fechaInicio=$data['diainicio'];
	$fechaFin=date('Y-m-d', strtotime($data['diafin']." +1 days")); 
	for($i=strtotime($fechaInicio); $i<=strtotime($fechaFin); $i+=86400)
	{
		$dia = date('Y-m-d', $i);/* variable para el dia */
		if($dia==$fecha)
		{
			$eliminar = ("delete from sesiones where idsesiones = '$idsesion' ");
			$resulteliminar = mysql_query($eliminar) or die(mysql_error());
			echo"<script type='text/javascript'>
			alert('Hora ".$hora." eliminada.');
			window.location='../administrador/sesiones_formulario.php';
			</script>";
		}
	}	
}
}

?>
