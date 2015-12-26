
<!-- CSS -->

<link href="Estilos/reservar_pelicula.css" rel="stylesheet" type="text/css" />
<link href="lib/jqueryui/css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet" type="text/css" />
		
<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="lib/jqueryui/js/jquery-ui-1.9.0.custom.min.js"></script>
<?php

include('conexion.php');
include('cuerpo_pagina/cabecera.php');
include('cuerpo_pagina/solo_registrado.php');
include('cuerpo_pagina/menu_cliente.php');
include('cuerpo_pagina/solo_cliente.php');

echo"<div id='sesiones'>";
$consultatres=("SELECT * FROM sesiones AS s JOIN peliculas AS p ON s.idpeliculas = p.idpeliculas  GROUP BY s.idpeliculas ORDER BY diainicio ASC ");
    $resultadotres = mysql_query($consultatres);
    while($filatres = mysql_fetch_array($resultadotres))/*bucle para mostrar las peliculas con sus horarios*/
    {
		echo "<div id='una_pelicula'>";
		echo "<div id='titulo'><h2>".$filatres['titulo']."</div>";
		echo "<div id='imagen'><img src= 'Imagenes/peliculas/".$filatres['foto']."' width='140' heigth='120'/></div>";
		echo "<table>";
		echo"<tr>";
		$hoy = date('Y-m-d');/*variable para la fecha actual*/
		$ahora = date('H:i:s');/*variable para la hora actual*/
	
		$consultacuatro=("select MAX(`diafin`) as diafin, MIN(`diainicio`) as diainicio  from sesiones where idpeliculas = '".$filatres['idpeliculas']."' ");
		$resultadocuatro = mysql_query($consultacuatro);
		$data = mysql_fetch_array($resultadocuatro); 
		$fechaInicio=$data['diainicio'];
		$fechaFin=date('Y-m-d', strtotime($data['diafin']." +1 days")); 
		for($i=strtotime($fechaInicio); $i<=strtotime($fechaFin); $i+=86400)
		{
			$dia = date('Y-m-d', $i);/* variable para el dia */
			if($dia>=$hoy)
			{
				$consultacinco=("select * from sesiones where idpeliculas = '".$filatres['idpeliculas']."' and diainicio <= '".$dia."' and diafin >= '".$dia."' order by diainicio ASC , hora ASC ");
				$resultadocinco = mysql_query($consultacinco);
				if(mysql_num_rows($resultadocinco)==0)
				continue;
				echo "<td><p>".$dia."</p>";
				while($filacinco = mysql_fetch_array($resultadocinco))
				{
					if( $dia != $hoy || ( $dia<= $hoy && $dia >= $hoy && $filacinco['hora'] > $ahora))
					{
						 echo "<a href='reservar_butaca.php?cod=".$filacinco['idsesiones']."&dia=".$dia."&hora=".$filacinco['hora']."&idpeliculas=".$filacinco['idpeliculas']."'><p>".$filacinco['hora']."</p></a><br />";
					}
				}		
				echo "</td>";
			}
		}
		echo"</tr>";
		echo"</table>";
		echo"</div>";
    }
    
?>
</div>
<?php
include('cuerpo_pagina/pie.php');
?>
