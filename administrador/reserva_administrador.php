<!-- SCRIPTS --><link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/eliminar_reserva.js"></script>
<?php
include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');

$consultados = ("SELECT * FROM reservas AS r JOIN peliculas AS p ON r.idpeliculas = p.idpeliculas join usuario as u on r.idusuario = u.idusuario ORDER BY r.fecha DESC ");
$resultadodos = mysql_query($consultados);
if(mysql_num_rows($resultadodos)==0)
{
	echo"No hay datos";
}
else
{
echo"<table cellspacing='2' cellpadding='2' border='1' align='center' >";
echo"<tr>";
echo"<td align='center'>Idusuario</td>";
echo"<td align='center'>Nombre</td>";
echo"<td align='center'>Apellido</td>";
echo"<td align='center'>Fecha</td>";
echo"<td align='center'>Hora</td>";
echo"<td align='center'>Pelicula</td>";
echo"<td align='center'>Butaca</td>";
echo"<td align='center'>Eliminar</td>";
echo"</tr>";
	while($filados = mysql_fetch_array($resultadodos))
	{
		echo "<tr>";
		echo "<td align='center'>".$filados['idusuario']."</td>";
		echo "<td align='center'>".$filados['nombre']."</td>";
		echo "<td align='center'>".$filados['apellido']."</td>";
		echo "<td align='center'>".$filados['fecha']."</td>";
		echo "<td align='center'>".$filados['hora']."</td>";
		echo "<td align='center'>".$filados['titulo']."</td>";
		echo "<td align='center'>".$filados['butaca']."</td>";
?>
		<td align='center'><a href='javascript: confirmacion("<?php echo $filados['idreservas']; ?>","<?php echo $filados['fecha']; ?>","<?php echo $filados['hora']; ?>","<?php echo $filados['butaca']; ?>"); '>
		<img src='../Imagenes/b_drop.png'/></a></td>
<?php
	}

}

include('../cuerpo_pagina/pie.php');
?>
