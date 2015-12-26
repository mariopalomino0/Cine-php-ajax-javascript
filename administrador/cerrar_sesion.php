<?php
$consultaalta = ("select * from usuario where idusuario = '$login'");
$resultadoalta = mysql_query($consultaalta) or die(mysql_error());
$filaalta = mysql_fetch_array($resultadoalta);
if(isset($_SESSION['login']))
{
	echo "<div id='bienvenido'>";
	echo "<form action='salir.php' method='get' id='salir' onsubmit='#'>";
	echo "<br><p>" .$filaalta["nombre"]."<br>".$filaalta['apellido'] . "</p>";
	echo "<input type='submit' value='Cerrar sesion'/>";
	echo "</form>";
	echo "</div>";
	$login = $_SESSION['login'];
}
else
{
	$login = '';
}
?>
