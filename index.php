<!-- css -->
<link href="Estilos/indice.css" rel="stylesheet" type="text/css" />
<!-- SCRIPTS -->
<script type="text/javascript" src="js/md5.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<?php
include('conexion.php');
include('cuerpo_pagina/cabecera.php');
include('cuerpo_pagina/menu_cliente.php');
include('cuerpo_pagina/cerrar_sesion.php');
include('cuerpo_pagina/solo_cliente.php');

echo"<div id='estrenos'>
<h3 class='estrenos_titulo'>Proximos Estrenos</h3>";
$consultados = mysql_query("select titulo , foto, descripcion from peliculas order by RAND() LIMIT 1");
while ($filados=mysql_fetch_array($consultados))
{
	echo "<h2 class='estrenos_pelicula'>".$filados['titulo']."<br />";
	echo "<img class='estrenos_imagen' src='Imagenes/peliculas/".$filados['foto']."' width='320' heigth='300'/>";
	echo "<p class='estrenos_sinopsis'>".$filados['descripcion']."</p>";
}
echo"</div>
	<div id='registerForm'>";
	if(isset($_SESSION['login']))/*Si la sesion existe oculto el login*/
	{
		$_SESSION['login'];
		echo"<script type='text/javascript'>
		document.getElementById('registerForm').style.display='none';
		</script>";
	}
?>
	<p>INICIAR SESION</p>
	<form action="login.php" method="GET" id="login" onsubmit="return envio();">
		<div class="element">
			<div class="elementTitle">
				Login
			</div>
			<div class="elementInput">
				<input type="text" name="nom" id="nom" /><img class="asteris" id="asterisnom" style="display:none" src="Imagenes/asterisco.png">
			</div>
		</div>
		<div class="element">
			<div class="elementTitle">
				Contrase&ntilde;a
			</div>
			<div class="elementInput">
				<input type="password" name="password" id="password" /><img class="asteris" id="asterispass" style="display:none" src="Imagenes/asterisco.png">
			</div>
		</div>
		<div class="element">
			<input type="submit" value="Enviar" />
		</div>
	</form>
	<p><a  href="password_formulario.php">HAS OLVIDADO TU CONTRASE&Ntilde;A???</a></p>
	<p><a  href="registro_formulario.php">CREA UNA CUENTA DE USUARIO</a></p>
</div><!--pie de registerForm -->
<?php
include('cuerpo_pagina/pie.php');
?>
