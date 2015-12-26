<?php

if(isset($_SESSION['login']))
{
	echo "<div id='bienvenido'>";
	echo "<form action='salir.php' method='get' id='salir' onsubmit='#'>";
	echo "<br><p>" .$fila["nombre"]."<br>".$fila['apellido'] . "</p>";
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
