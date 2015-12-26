

<?php
$hoy = date('Y-m-d');/*variable para la fecha actual*/

include('../conexion.php');
$idusuario = $_GET['idusuario'];
$query = ("select * from reservas as r join peliculas as p on r.idpeliculas = p.idpeliculas where r.idusuario = '$idusuario' and r.fecha >= '$hoy'  ");
$result= mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)==0)
{
	echo"No hay reservas.";	
}
else
{
	echo"<table cellspacing='2' cellpadding='2' border='1' align='center' >";
echo"<tr>";
echo"<td align='center'>Titulo</td>";
echo"<td align='center'>Fecha</td>";
echo"<td align='center'>Hora</td>";
echo"</tr>";
	while($fila = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td align='center'>".$fila['titulo']."</td>";
		echo "<td align='center'>".$fila['fecha']."</td>";
		echo "<td align='center'>".$fila['hora']."</td>";
		echo "</tr>";
	}
	echo"</table>";
}
?>