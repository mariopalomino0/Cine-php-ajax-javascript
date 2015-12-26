<?php
include('../conexion.php');
if(isset($_POST['titulo']) && isset($_POST['link']))
{
	$titulo = $_POST['titulo'];
	$link = $_POST['link'];
	$descripcion = $_POST['descripcion'];
}
else
{
	exit();
}
if($_POST['submit'])
{
	$name = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	$type = $_FILES['foto']['type'];
	$size = $_FILES['foto']['size'];
	
	$permitido = true;
	if(($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/pjpeg") || ($type == "image/png") &&($size < 10000000))
	{
		move_uploaded_file($temp,"../Imagenes/peliculas/".$name);
	}
	else
	{
		echo "<script type='text/javascript'>
		alert('Este tipo de archivo no esta permitido.');
		window.location='peliculas_formulario.php';
		</script>";
		$permitido = false;
	}
}
if($permitido == true)
{	
	$consulta = ("SELECT * FROM peliculas WHERE titulo ='$titulo'") ;
	$resultado = mysql_query($consulta)or die (mysql_error());

	if(mysql_num_rows($resultado)  == 0 )
	{
		$insert = mysql_query("INSERT INTO peliculas (titulo ,foto ,descripcion,link ) VALUES('$titulo','$name','$descripcion','$link')");
		echo"<script type='text/javascript'>
		alert('Se ingreso la pelicula a la base de datos correctamente.');
		window.location='peliculas_formulario.php';
		</script>";
	}
	else
	{
		echo"<script type='text/javascript'>
		alert('Este titulo no esta disponible.');
		window.location='peliculas_formulario.php';
		</script>";
	}
}
?>
