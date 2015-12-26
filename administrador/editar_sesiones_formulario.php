
<!-- CSS -->
<link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />
<link href="../lib/jqueryui/css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/sesiones.css" rel="stylesheet" type="text/css" />

<!-- SCRIPTS -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../lib/jqueryui/js/jquery-ui-1.9.0.custom.min.js"></script>
<script type="text/javascript" src="../js/editar_sesiones.js"></script>

<?php
include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');
?>
<div id="div_sesiones_formulario">
<form id="sesiones_formulario" name="sesiones_formulario" method="get" action="editar_sesiones.php" onsubmit="return validate();" >
<input type='hidden' id='idpeliculas' name='idpeliculas' value='<?php echo $_GET['cod']?>'/>
Editar Sesion
<br /><br />
Dia Inicio 
<br /><br />		
<input type="text" id="datepickerin" name="datepickerin"  />
<br /><br />
Dia Fin
<br /><br />
<input type="text" id="datepickerfi" name="datepickerfi"  />
<br /><br />
Horarios
<br /><br />

16:00
<input type="checkbox" id="casilla1"  name="casilla[]" value="16:00:00"/><br />
18:00
<input type="checkbox" id="casilla2" name="casilla[]" value="18:00:00"/><br />
20:00
<input type="checkbox"  id="casilla3" name="casilla[]" value="20:00:00"/><br />
22:00
<input type="checkbox" id="casilla4" name="casilla[]" value="22:00:00"/><br />
01:00
<input type="checkbox" id="casilla5" name="casilla[]" value="01:00:00"/><br />
<br />
<input type="submit" value="Enviar" />
</form> 
</div>

<div id="sesiones">
<?php
$consultados=mysql_query("SELECT * FROM sesiones  as s join peliculas as p on  p.idpeliculas = s.idpeliculas  WHERE s.idpeliculas ='".$_GET['cod']."' GROUP BY s.idpeliculas ORDER BY diainicio ASC ");
while($filados =  mysql_fetch_array($consultados))
{
		echo "<div id='una_pelicula'>";
		echo"<input type='hidden' id='idpeliculas' name='idpeliculas' value='".$_GET['cod']."'/>";
		echo "<div id='titulo'><h2>".$filados['titulo']."</h2>";
		echo "<div id='imagen'><img src= '../Imagenes/peliculas/".$filados['foto']."' width='140' heigth='120'/></div>";
		echo "<table id='tabla' cellspacing='1' cellpadding='1' border='1' align='center' >";
		echo"<tr>";
		$hoy = date('Y-m-d');/*variable para la fecha actual*/
		$ahora = date('H:i:s');/*variable para la hora actual*/
	
		$consultatres=("select * , MAX(`diafin`) as diafin, MIN(`diainicio`) as diainicio  from sesiones where idpeliculas = '".$filados['idpeliculas']."' ");
		$resultadotres = mysql_query($consultatres);
		$data = mysql_fetch_array($resultadotres); 
		echo"<input type='hidden' id='diainicio' name='diainicio' value='".$data['diainicio']."'/>";//dia inicio hidden
		echo"<input type='hidden' id='diafin' name='diafin' value='".$data['diafin']."'/>";//diafin hidden
		$fechaInicio=$data['diainicio'];
		$fechaFin=date('Y-m-d', strtotime($data['diafin']." +1 days")); 
		for($i=strtotime($fechaInicio); $i<=strtotime($fechaFin); $i+=86400)
		{
			$dia = date('Y-m-d', $i);/* variable para el dia */
			if($dia>=$hoy)
			{
				$consultacuatro=("select * from sesiones where idpeliculas = '".$filados['idpeliculas']."' and diainicio <= '".$dia."' and diafin >= '".$dia."'  order by diainicio ASC , hora ASC ");
				$resultadocuatro = mysql_query($consultacuatro);
				if(mysql_num_rows($resultadocuatro)==0)
				continue;
				echo "<td><p>".$dia."<a href=\"javascript: confirmacion_dia('".$dia."','".$data['idsesiones']."','".$data['idpeliculas']."');\" ><img src='../Imagenes/b_drop.png' title='Eliminar dia' /></a></p>";
				while($filacuatro = mysql_fetch_array($resultadocuatro))
				{
					if( $dia != $hoy || ( $dia<= $hoy && $dia >= $hoy && $filacuatro['hora'] > $ahora))
					{
						echo"<p>".$filacuatro['hora']."<a href=\"javascript: confirmacion_hora('".$filacuatro['hora']."','".$dia."','".$filacuatro['idsesiones']."','".$filacuatro['idpeliculas']."');\" ><img src='../Imagenes/b_drop.png' title='Eliminar hora' /></a></p><br/>";
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
include('../cuerpo_pagina/pie.php');
?>
