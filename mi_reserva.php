
<!-- CSS -->
<link href="lib/jqueryui/css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet" type="text/css" />

<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="lib/jqueryui/js/jquery-ui-1.9.0.custom.min.js"></script>
<script type="text/javascript" src="js/mi_reserva.js"></script>  
	
 
<?php

include('conexion.php');
include('cuerpo_pagina/cabecera.php');


include('cuerpo_pagina/solo_registrado.php');
include('cuerpo_pagina/menu_cliente.php');
include('cuerpo_pagina/solo_cliente.php');

echo"<br /><br />
<div id='formulario'>
	<form id='reservar_butaca' name='reservar_butaca'   > 
		<h2>Consultar reservas pasadas :</h2>
		Ingrese la fecha para poder ver sus reservas.<br /><br />
 		<input type='text' id='datepickerpasado' name='datepickerpasado'/>
		<input type='button' value='Enviar' onclick='ajaxgeti()'>
		
		<h2>Consultar reservas futuras :</h2>
		Ingrese la fecha para poder ver sus reservas.<br /><br />
 		<input type='text' id='datepickerfuturo' name='datepickerfuturo'/>
		<input type='button' value='Enviar' onclick='ajaxgetii()'>
 		<br /><br />
	</form>
</div>";
?>

<div id="midiv"></div>
<div id="todo_reserva">
<p style="text-align:center">Todas las reservas.</p>
<?php
$consulta = ("SELECT * FROM reservas AS r JOIN peliculas AS p ON r.idpeliculas = p.idpeliculas  join usuario as u on u.idusuario = r.idusuario  where r.idusuario = '".$_SESSION['login']."' ORDER BY r.fecha DESC ");
		$resultado = mysql_query($consulta);
		if(mysql_num_rows($resultado)== 0 )
		{
			echo "No tiene reservas para esta fecha.";	
		}
		else
		{
			echo"<div id='mostrarajax'>";
			echo"<table cellspacing='1' cellpadding='1' border='1' align='center' >";
			echo"<tr>";
			echo"<td align='center'>Fecha</td>";
			echo"<td align='center'>Hora</td>";
			echo"<td align='center'>Pelicula</td>";
			echo"<td align='center'>Butaca</td>";
			echo"<td align='center'>Editar</td>";
			echo"</tr>";
			while($fila = mysql_fetch_array($resultado))
			{
				
					echo "<tr>";
					echo "<td align='center'>".$fila['fecha']."</td>";
					echo "<td align='center'>".$fila['hora']."</td>";
					echo "<td align='center'>".$fila['titulo']."</td>";
					echo "<td align='center'>".$fila['butaca']."</td>";
					echo "<td align='center'><a href='editar_reserva_formulario.php?cod=".$fila['idreservas']."&idpeliculas=".$fila['idpeliculas']."'><img src='Imagenes/b_edit.png' onclick='editar()'/></a></td>";
					echo"</tr>";
			}
			echo"</table>";
			echo"</div>";
		}
?>
</div>

<?php
include('cuerpo_pagina/pie.php');
?>	
