<?php
include('../conexion.php');
if( isset($_GET['cod']) && isset($_GET['cod']) )
{
    $cod = $_GET['cod'];
    $foto = $_GET['foto'];
}
else
{
    exit();
}
$consulta = ("SELECT butaca FROM reservas WHERE idpeliculas =  '$cod' ");
$result = mysql_query($consulta) or die(mysql_error());
if(mysql_num_rows($result) > 0 )
{
	echo"<script>
	alert('Esta pelicula tiene reservas no se puede eliminar');
	window.location='peliculas_formulario.php';
	</script>";

}
else
{
mysql_query("DELETE FROM peliculas WHERE idpeliculas = '$cod';") or die(mysql_error());
unlink('../Imagenes/peliculas/'.$foto);

	echo"<script>
	alert('Esta pelicula se elimino correctamente');
	window.location='peliculas_formulario.php';
	</script>";
}

?>
