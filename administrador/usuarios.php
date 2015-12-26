
<!-- CSS -->
<link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />

<!-- SCRIPTS -->
<script type="text/javascript" src="../js/md5.js"></script>
<script type="text/javascript" src="../js/usuarios.js"></script>
<?php
include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');

echo"<div id='user'>";

	$consultados = "select * from usuario ";
	$resultadodos = mysql_query($consultados);
	echo"<table cellspacing='1' cellpadding='1' border='1' align='center'>";
	echo"<tr>";
	echo"<td align='center'>Idusuario</td>";
	echo"<td align='center'>Nombre</td>";
	echo"<td align='center'>Apellido</td>";
	echo"<td align='center'>Anio</td>";
	echo"<td align='center'>Genero</td>";
	echo"<td align='center'>Login</td>";
	echo"<td align='center'>Password</td>";
	echo"<td align='center'>Poblacion</td>";
	echo"<td align='center'>Useradmin</td>";
	echo"<td align='center'>Editar usuario</td>";
	echo"<td align='center'>Eliminar</td>";
	echo "</tr>";
	if( mysql_num_rows($resultadodos) == 0 )
	{
		echo"<script type='text/javascript'>
		alert('No hay datos');
		</script>"; 
	}
	else
	{
		while($filados= mysql_fetch_array($resultadodos))
		{
			echo "<tr>";
			echo "<td align='center'>".$filados['idusuario']."</td>";
			echo "<td align='center'>".$filados['nombre']."</td>";
			echo "<td align='center'>".$filados['apellido']."</td>";
			echo "<td align='center'>".$filados['anio']."</td>";
			echo "<td align='center'>".$filados['genero']."</td>";
			echo "<td align='center'>".$filados['login']."</td>";
			echo "<td align='center'>".$filados['password']."</td>";
			echo "<td align='center'>".$filados['poblacion']."</td>";
			echo "<td align='center'>".$filados['useradmin']."</td>";
			echo "<td align='center'><a href='editar_usuarios_formulario.php?cod=".$filados['idusuario']."'><img src='../Imagenes/b_edit.png' onclick='editar()'/></a></td>";
			echo "<td align='center'><a href=\"javascript: confirmacion('".$filados['idusuario']."');\" ><img src='../Imagenes/b_drop.png' /></a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>
</div>   
<?php
include('../cuerpo_pagina/pie.php');
?>
