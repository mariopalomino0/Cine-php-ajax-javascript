<?php
include('../conexion.php');
$datepickerin = date('Y-m-d', strtotime($_GET['datepickerin']));
$datepickerfi = date('Y-m-d', strtotime($_GET['datepickerfi']));
$pelicula = $_GET['idpeliculas'];echo"<br />";
$casilla = $_GET['casilla'];



foreach($casilla as $hora)
{
	$fechaocupada = array();//arreglo para guardar las fechas ocupadas
	$query = ("select * from sesiones where hora = '$hora'");
	$result = mysql_query($query) or die(mysql_error());
	while($fila = mysql_fetch_array($result))
	{
		for($i=strtotime($fila['diainicio']); $i<=strtotime($fila['diafin']); $i+=86400)
		{
			$diaocupado = date('Y-m-d', $i);echo"<br />";
			$fechaocupada[$diaocupado]=$diaocupado;//guardo las fechas ocupadas en un arreglo
		}
	}
	$datos_insert=array();
	$rango_total=0;
	$rango_disponibles=0;
	for($x=strtotime($datepickerin); $x<=strtotime($datepickerfi); $x+=86400)
	{
		$dia = date('Y-m-d', $x);echo"<br />";
		if(array_key_exists($dia,$fechaocupada))//verifica si el dia existe en el arreglo fechaocupada
		{
			/*echo"<script type='text/javascript'>
        	alert('Este dia ".$dia." no estan disponibles.');
			</script>";*/
			
		}
		else
		{
			$rango_disponibles++;
			$datos_insert[$dia]=$dia;
			/*echo"<script type='text/javascript'>
        	alert('Este dia ".$dia." se ingresaron correctamente.');
			</script>";*/
		}
		$rango_total++;
	}
	if(count($datos_insert) && $rango_total>0)
	{
		if($rango_total==$rango_disponibles)
		{
			foreach ($datos_insert as $fechainsert)
			{
				$insert = ("INSERT INTO sesiones (diainicio,diafin,hora,idpeliculas) VALUES('$fechainsert','$fechainsert','$hora','$pelicula')");
				mysql_query($insert) or die(mysql_error());
				//inserta todo el rango
				
			}
			
		}
		else
		{
			foreach ($datos_insert as $fechainsert)
			{
				$insert = ("INSERT INTO sesiones (diainicio,diafin,hora,idpeliculas) VALUES('$fechainsert','$fechainsert','$hora','$pelicula')");
				mysql_query($insert) or die(mysql_error());
			}
			//inserta registro por registro	
			
		}
	}
			echo"<script type='text/javascript'>
        	window.location='sesiones_formulario.php';
			</script>";
				
}
?>
