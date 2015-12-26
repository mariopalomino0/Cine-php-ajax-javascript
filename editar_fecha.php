<?php
session_start();
include('conexion.php');
if(isset($_GET['idpeliculas']) && isset($_GET['datepicker']))
{
	$idpeliculas =  $_GET['idpeliculas'];
	$datepicker = date('Y-m-d', strtotime($_GET['datepicker']));
}
else
{
	echo"<script type='text/javascript'>
	alert('Las variables no llegaron.');
	window.location='editar_reserva_formulario.php';
	</script>";
}
$consultatres=("select * from sesiones where idpeliculas = '$idpeliculas' and diainicio <= '$datepicker' and diafin >= '$datepicker'  order by diainicio ASC , hora ASC ");
$resultadotres = mysql_query($consultatres);
if(mysql_num_rows($resultadotres)==0)
{
	echo"No hy horas disponibles para esta fecha";
}
else
{
	echo"<h3>hora : </h3>Eliga la hora disponible de la pelicula.<br /><br />";
	while($filatres = mysql_fetch_array($resultadotres))
	{
		if($filatres['hora'] > date('H:i:s') && $filatres['diainicio'] == date('Y-m-d')  )
		{
		echo $filatres['hora']."<input type='radio' id='hora' name='hora' value='".$filatres['hora']."'/><br /><br />";
		}
		if($filatres['diainicio'] != date('Y-m-d'))
		{
			echo $filatres['hora']."<input type='radio' id='hora' name='hora' value='".$filatres['hora']."'/><br /><br />";
		}
}
}		
?>