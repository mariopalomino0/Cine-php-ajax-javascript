<?php
$ADMIN;
if($ADMIN==true)
{
    echo"<div id='menu'>";
	echo"<div class='elementoMenu' id='MenuInicio' style='margin-left:300px;'>";
    echo"<a title='Administrar Usuarios' href='usuarios.php'>USUARIOS</a>";
    echo"</div>";
    echo"<div class='elementoMenu'>";
    echo"<a title='Administrar Peliculas' href='peliculas_formulario.php'>PELICULAS</a>";
    echo"</div>";
    echo"<div class='elementoMenu'>";
    echo"<a  title='Administrar Sesiones' href='sesiones_formulario.php'>SESIONES</a>";
    echo"</div>";
    echo"<div class='elementoMenu'>";
    echo"<a title='Administrar Reservas' href='reserva_administrador.php'>RESERVAS</a>";
    echo"</div>";
	echo"<div class='elementoMenu'>";
   echo"<a title='Examen' href='examen.php'>EXAMEN</a>";
   echo"</div>";
    echo"</div>";
    include('cerrar_sesion.php');
}
	
	
?>	
