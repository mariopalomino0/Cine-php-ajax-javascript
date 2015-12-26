
<!-- CSS -->
<link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />
<link href="../lib/jqueryui/css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/sesiones.css" rel="stylesheet" type="text/css" />

<!-- SCRIPTS -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../lib/jqueryui/js/jquery-ui-1.9.0.custom.min.js"></script>
<script type="text/javascript" src="../js/sesiones.js"></script>    

<?php
include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');
?>
<div id="div_sesiones_formulario">
    <form id="sesiones_formulario" name="sesiones_formulario" method="get" action="sesiones.php" onsubmit="return validate();" >
        Crear Sesion<br /><br />
        Pelicula
        <br /><br />
        <select id="pelicula" name="pelicula" >
        <option>Seleccionar</option>
        <?php
        $consultados=("SELECT * FROM  peliculas ");
        $resultadodos = mysql_query($consultados);
        while($filados = mysql_fetch_row($resultadodos))
        {
            echo"<option value='".$filados['0']."'>".$filados['1']."</option>";
        }
        ?>
        </select>
        <br /><br />
        Dia Inicio 
        <br /><br />
        <input type="text" id="datepickerini" name="datepickerini"  />
        <br /><br />
        Dia Fin
        <br /><br />
        <input type="text" id="datepickerfin" name="datepickerfin"  />
        <br /><br />
        Horarios
        <br />
        16:00
        <input type="checkbox" id="casilla1" name="casilla[]" value="16:00:00"/><br />
        18:00
        <input type="checkbox" id="casilla1" name="casilla[]" value="18:00:00"/><br />
        20:00
        <input type="checkbox" id="casilla1" name="casilla[]" value="20:00:00"/><br />
        22:00
        <input type="checkbox" id="casilla1" name="casilla[]" value="22:00:00"/><br />
        01:00
        <input type="checkbox" id="casilla1" name="casilla[]" value="01:00:00"/><br />
        <br />
        <input type="submit" value="Enviar" />
	</form>
</div>
<?php
echo"<div id='sesiones'>";
$consultatres=("SELECT * FROM sesiones AS s JOIN peliculas AS p ON s.idpeliculas = p.idpeliculas  GROUP BY s.idpeliculas ORDER BY diainicio ASC  ");
    $resultadotres = mysql_query($consultatres);
    while($filatres = mysql_fetch_array($resultadotres))/*bucle para mostrar las peliculas con sus horarios*/
    {
		echo "<div id='una_pelicula'>";
		echo "<div id='titulo'><h2>".$filatres['titulo']."<a href='editar_sesiones_formulario.php?cod=".$filatres['idpeliculas']."'><img src='../Imagenes/b_edit.png' title='Editar sesiones'></a></div>";
		echo "<div id='imagen'><img src='../Imagenes/peliculas/".$filatres['foto']."' width='140' heigth='120'/></div>";
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
						 echo "<p>".$filacinco['hora']."</p><br />";
					}
				}		
				echo "</td>";
			}
		}
		echo"</tr>";
		echo"</table>";
		echo"</div>";
    }
echo"</div>";
include('../cuerpo_pagina/pie.php');
?>
