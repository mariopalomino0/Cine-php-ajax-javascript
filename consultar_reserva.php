
<?php
session_start();
include('conexion.php');


if (isset($_GET['datepickerpasado']) )
{
	 //Tomamos el valor ingresado
	$datepickerpasado = $_GET['datepickerpasado'];
	$buscarpasado = date("Y-m-d", strtotime($datepickerpasado));
	
	// Si está vacío, lo informamos, sino realizamos la búsqueda
	if(empty($buscarpasado) )
	{
		echo "Por favor ingrese una busqueda.";	
	}
	else
	{
		// Conexión a la base de datos y seleccion de registros
		echo"<p style='text-align:center'>Reservas Pasadas</p>";
		$horaactual = date("H:i:s");
		$consultabuscar = ("SELECT * FROM reservas AS r JOIN peliculas AS p ON r.idpeliculas = p.idpeliculas  join usuario as u on u.idusuario = r.idusuario WHERE r.fecha <= '".$buscarpasado."' and r.idusuario = '".$_SESSION['login']."' and r.hora <= '".$horaactual."' ORDER BY r.fecha DESC ");
		$resultadobuscar = mysql_query($consultabuscar);
		if(mysql_num_rows($resultadobuscar)== 0 )
		{
			echo "No tiene reservas para esta fecha.";	
		}
		else
		{
			echo"<div id='mostrarajax'>";
			echo"<table cellspacing='2' cellpadding='2' border='1' align='center' >";
			echo"<tr>";
			echo"<td align='center'>Fecha</td>";
			echo"<td align='center'>Hora</td>";
			echo"<td align='center'>Pelicula</td>";
			echo"<td align='center'>Butaca</td>";
			echo"<td align='center'>Editar</td>";
			echo"</tr>";
			while($filabuscar = mysql_fetch_array($resultadobuscar))
			{
				
					echo "<tr>";
					echo "<td align='center'>".$filabuscar['fecha']."</td>";
					echo "<td align='center'>".$filabuscar['hora']."</td>";
					echo "<td align='center'>".$filabuscar['titulo']."</td>";
					echo "<td align='center'>".$filabuscar['butaca']."</td>";
					echo "<td align='center'><a href='editar_reserva_formulario.php?cod=".$filabuscar['idreservas']."&idpeliculas=".$filabuscar['idpeliculas']."'><img src='Imagenes/b_edit.png' onclick='editar()'/></a></td>";
					echo"</tr>";
			}
			echo"</table>";
			echo"</div>";
		}
	}
}

if (isset($_GET['datepickerfuturo']) )
{
	 //Tomamos el valor ingresado
	$datepickerfuturo = $_GET['datepickerfuturo'];
	$buscarfuturo = date("Y-m-d", strtotime($datepickerfuturo));
	
	// Si está vacío, lo informamos, sino realizamos la búsqueda
	if(empty($buscarfuturo))
	{
		echo "Por favor ingrese una busqueda.";	
	}
	else
	{
		echo"<p style='text-align:center'>Reservas Futuras</p>";
		// Conexión a la base de datos y seleccion de registros
		
		$hoy = date("Y-m-d");
		$horaactual = date("H:i:s");
		$consultabuscarii = ("SELECT * FROM reservas AS r JOIN peliculas AS p ON r.idpeliculas = p.idpeliculas  join usuario as u on u.idusuario = r.idusuario  WHERE r.fecha >= '".$buscarfuturo."' and r.hora >= '".$horaactual."' and r.idusuario = '".$_SESSION['login']."' ORDER BY r.fecha DESC ");
		$resultadobuscarii = mysql_query($consultabuscarii);
		if(mysql_num_rows($resultadobuscarii)== 0 )
		{
			echo "No tiene reservas para esta fecha.";	
		}
		else
		{
			echo"<div id='mostrarajax'>";
			echo"<table cellspacing='2' cellpadding='2' border='1' align='center' >";
			echo"<tr>";
			echo"<td align='center'>Fecha</td>";
			echo"<td align='center'>Hora</td>";
			echo"<td align='center'>Pelicula</td>";
			echo"<td align='center'>Butaca</td>";
			echo"<td align='center'>Editar</td>";
			echo"</tr>";
			while($filabuscarii = mysql_fetch_array($resultadobuscarii))
			{
				
					echo "<tr>";
					echo "<td align='center'>".$filabuscarii['fecha']."</td>";
					echo "<td align='center'>".$filabuscarii['hora']."</td>";
					echo "<td align='center'>".$filabuscarii['titulo']."</td>";
					echo "<td align='center'>".$filabuscarii['butaca']."</td>";
					echo "<td align='center'><a href='editar_reserva_formulario.php?cod=".$filabuscarii['idreservas']."&idpeliculas=".$filabuscarii['idpeliculas']."'><img src='Imagenes/b_edit.png' onclick='editar()'/></a></td>";
					echo"</tr>";
				
			}
			echo"</table>";
			echo"</div";
		}
}

}
?>
