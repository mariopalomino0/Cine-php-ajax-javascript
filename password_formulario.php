
<!-- CSS -->

<link href="../Estilos/password.css" rel="stylesheet" type="text/css" />
<!-- SCRIPTS -->
<script type="text/javascript" src="js/password.js"></script>

<?php
include('conexion.php');
include('cuerpo_pagina/cabecera.php');
include('cuerpo_pagina/menu_cliente.php');


?>  
<div id="div">
    <form action="password.php"  id="myform" method="get" onsubmit="return password();" >
	Ingrese su login por favor:
	<br/><br/>
	<input  type="text"   id="login"  name="login" size="30"/><img class="asteris" id="asterislogin" style="display:none" alt="" src="Imagenes/asterisco.png"/>
	<br/><br/>
	<input type="submit" value="Enviar" name="boton_registro"/>
	<input type="reset"  value="Limpiar"  name="boton_limpiar"/>
    </form>
</div>
<?php
include('cuerpo_pagina/pie.php');
?>	