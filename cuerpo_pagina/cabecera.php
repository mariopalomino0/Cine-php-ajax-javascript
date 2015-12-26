<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv=Content-Type content="text/html; charset=ISO-8859-1">
<title></title>
<!-- CSS -->
<link href="Estilos/general.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();/*condicion sesion*/
if(isset($_SESSION['login']))
{
    $login = $_SESSION['login'];
}
else
{
    $login = '';
}

$consulta = mysql_query("SELECT * FROM usuario WHERE idusuario = '$login'") or die(mysql_error()); 
$ADMIN = false;/*variable auxiliar para saber si es administrador*/
$fila = mysql_fetch_array($consulta);
if($fila["useradmin"]==1)
{
	$ADMIN=true;
}
else
{
	$ADMIN=false;
}


echo"<div id='todo'>";
echo"<div id='cabecera'>";
echo"<h1>Sala mpalominoc21</h1>";
echo"</div>";
?>
