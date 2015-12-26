<?php
include('../conexion.php');
if ( isset($_POST['cod']) && isset($_POST['titulo']) && isset($_POST['link']) && isset($_POST['foto']) && isset($_POST['descripcion']))/*definimos variables*/
{
	$cod = $_POST['cod'];
	$titulo = $_POST['titulo'];
	$link = $_POST['link'];
	$foto = $_POST['foto'];
	$descripcion = $_POST['descripcion'];
}
else
{
	exit();
}
unlink('../Imagenes/peliculas/'.$foto);/*borra el archivo*/
if($_POST['submit'])
{
	$name = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	$type = $_FILES['foto']['type'];
	$size = $_FILES['foto']['size'];
	$permitido = true;/*variable auxiliar para que solamente ingresen archivos de tipo imagen*/
	
        if(($type == "image/jpeg") || ($type == "image/jpg") || ($type == "image/pjpeg") || ($type == "image/png") &&($size < 10000000) || ($name == $foto))
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
if($permitido == true)/*si el archivo subido cumple la condicion hacemos UPDATE*/
{	
	
	$query = ("UPDATE peliculas SET titulo = '$titulo' ,foto = '$name' ,descripcion = '$descripcion', link = '$link'  WHERE idpeliculas = '$cod'"); 
	$update = mysql_query($query)or die(mysql_error());
	echo"<script type='text/javascript'>
	alert('Se ingreso la pelicula a la base de datos correctamente.');
	window.location='peliculas_formulario.php';
	</script>";
}
?>
