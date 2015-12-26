
<!-- CSS -->
<link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/examen.js"></script>

<?php
include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');
$query = ("select * from usuario ");
$result = mysql_query($query) or die(mysql_error());
echo"
Consultar reservas:<br /><br />
Usuarios
<form id='formulario' name='formulario' action='consultar_reserva_examen.php'/>
<select id='usuarios' name='usuarios' >
<option value=''>Seleccionar</option>";
while($fila=mysql_fetch_array($result))
{
	echo"<option value='".$fila['idusuario']."'>".$fila['nombre']."</option>";
}

echo"</select>
<input type='button' onclick='ajaxget();' value='Enviar'/>
</form>
";
echo"<div id='midiv'>
</div>";
include('../cuerpo_pagina/pie.php');
?>