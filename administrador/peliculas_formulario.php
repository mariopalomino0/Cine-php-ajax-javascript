
<!-- CSS -->
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/peliculas.css" rel="stylesheet" type="text/css" />
	
<!-- SCRIPTS -->
<script type="text/javascript" src="../js/peliculas.js"></script>

<?php

include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');

?>
<div id="peliculas">
<p class="titulo">Crear Peliculas</p>
<form action="peliculas.php" method="post" id="peliculas_formulario" name="peliculas_formulario" enctype="multipart/form-data" onsubmit="return validate_peliculas_formulario();">
<input type="hidden" name="MAX_FILE_SIZE" 	value="10000000"> 
<br /><br />
Titulo
<br /><br />
<input type="text" name="titulo" id="titulo"  size="30"/>
<br /><br />
Foto
<br /><br />
<input type="file" name="foto" id="foto" />
<br /><br />
Descripcion
<br /><br />
<textarea rows="8" cols="24" name="descripcion" id="descripcion" size="30" ></textarea>
<br /><br />
Link
<br /><br />
<input type="text" name="link" id="link" size="30" />
<br /><br />
<input type="submit" value="Enviar" id="submit" name="submit"/>
<br /><br />
</form>
</div>
<div id="peliculas_array">
<?php
	$consultados=("select * from peliculas");
	echo"<table cellspacing='2' cellpadding='2' border='1' align='center' >";
	echo"<tr>";
	echo"<td align='center'>idpeliculas</td>";
	echo"<td align='center'>foto</td>";
	echo"<td align='center'>titulo</td>";
	echo"<td align='center'>Descripcion</td>";
	echo"<td align='center'>link</td>";
	echo"<td align='center'>Editar</td>";
	echo"<td align='center'>Eliminar</td>";
	echo"</tr>";
	$resultadodos = mysql_query($consultados);
	if( mysql_num_rows($resultadodos) == 0 )
	{
		echo"<script type='text/javascript'>
		alert('No hay peliculas en la base de datos');
		</script>"; 
	}
	else
	{
		while($filados = mysql_fetch_array($resultadodos))
		{
			echo "<tr>";
			echo "<td align='center'>".$filados['idpeliculas']."</td>";
			echo "<td align='center'><img src= '../Imagenes/peliculas/".$filados['foto']."' width='135' heigth='185'/></td>";
			echo "<td align='center'>".$filados['titulo']."</td>";
			echo "<td align='center'>".$filados['descripcion']."</td>";
			echo "<td align='center'>".$filados['link']."</td>";
			echo "<td align='center'><a href='editar_peliculas_formulario.php?cod=".$filados['idpeliculas']."'><img src='../Imagenes/b_edit.png' onclick='editar()'/></a></td>";
?>
			<td align='center'><a href='javascript: confirmacion("<?php echo $filados['idpeliculas']; ?>","<?php echo $filados['titulo']; ?>","<?php echo $filados['foto']; ?>","<?php echo $filados['link']; ?>"); '>
			<img src='../Imagenes/b_drop.png'/></a></td>
			<?php
			echo "</tr>";
		}
	}
	echo "</table>";
			?>
</div>
<?php
include('../cuerpo_pagina/pie.php');
?>
