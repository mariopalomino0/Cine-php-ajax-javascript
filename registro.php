<?php
if( isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['anio']) && isset($_GET['genero']) && isset($_GET['login']) && isset($_GET['password1']) && isset($_GET['password2']) && isset($_GET['poblacion']) )
{
	$nombre=$_GET['nombre'];
	$apellido=$_GET['apellido'];
	$anio=$_GET['anio'];
	$genero=$_GET['genero'];
	$login=$_GET['login'];
	$password=$_GET['password1'];
	$poblacion=$_GET['poblacion'];
}
else
{
	exit();
}

include('conexion.php');

$consulta = ("SELECT login FROM usuario WHERE login ='$login'") ;
$resultado = mysql_query($consulta)or die (mysql_error());
if(mysql_num_rows($resultado)  == 0 )
{
	$insert = mysql_query("INSERT INTO usuario (nombre,apellido,anio,genero,login,password,poblacion) VALUES('$nombre','$apellido','$anio','$genero','$login','$password','$poblacion')") or die(mysql_error()  );
	echo"<script type='text/javascript'>
        alert('Gracias por registrarse.');
        window.location='index.php';
        </script>";
}
else
{
    echo"<script type='text/javascript'>
    alert('Este login no esta disponible.');
    window.location='registro_formulario.php';
    </script>";
}
?>
