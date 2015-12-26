
<!-- CSS -->

<link href="Estilos/reservar_butaca.css" rel="stylesheet" type="text/css" />

<!-- SCRIPTS -->
<script type="text/javascript" src="js/reservar_butaca.js"></script>

<script language='javascript'> 
var bloqueados=new Array();
<?php
include('conexion.php');
$consulta = mysql_query("SELECT  butaca  from reservas  where fecha='".$_GET['dia']."' and idpeliculas ='".$_GET['idpeliculas']."' and hora='".$_GET['hora']."' ");
$nb=0;
while($fila = mysql_fetch_array($consulta))
{
	echo "bloqueados[".$nb."] = ".$fila['butaca'].";";
	$nb++;
}
?>
</script>    
<?php    

include('conexion.php');
include('cuerpo_pagina/cabecera.php');
include('cuerpo_pagina/solo_registrado.php');
include('cuerpo_pagina/menu_cliente.php');

	

echo"<div id='pelicula'>";
$consultados = mysql_query("SELECT p.foto , s.hora ,p.link FROM sesiones AS s JOIN peliculas AS p ON s.idpeliculas = p.idpeliculas WHERE idsesiones ='".$_GET['cod']."'");
while($filados = mysql_fetch_array($consultados))
{
	echo "<div id='foto'><img src= 'Imagenes/peliculas/".$filados['foto']."' width='140' heigth='120'/></div>";
	echo "<br /><div id='dia'>".$_GET['dia']."</div>";
	echo "<br /><div id='hora'>".$filados['hora']."</div>";
}
?>
</div>

<div id="sillas">
</div>

<div id="NumeroButacas" >
</div>
<form id="reservar_butaca" name="reservar_butaca" method="get" action="reservar.php" onsubmit="return validate();">
	<input type="submit" value="Enviar"/>
	<div id="EnvioButacas">
	</div>
    <?php
   
$consultatres = mysql_query("SELECT s.idpeliculas as idpeliculas ,p.foto , s.hora ,p.link FROM sesiones AS s JOIN peliculas AS p ON s.idpeliculas = p.idpeliculas WHERE idsesiones ='".$_GET['cod']."'");
while($filatres = mysql_fetch_array($consultatres))
{
	echo "<input type='hidden' id='idpeliculas' name='idpeliculas' value='".$filatres['idpeliculas']."'/>";
	echo "<input type='hidden' id='dia' name='dia' value='".$_GET['dia']."' />";
	echo "<input type='hidden' id='hora' name='hora' value='".$filatres['hora']."' />";
   	echo "<input type='hidden' id='idusuario' name='idusuario' value='".$_SESSION['login']."'/>";
}
?>
	
</form>
<?php
include('cuerpo_pagina/pie.php');
?>

