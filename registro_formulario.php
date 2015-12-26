

<link href="Estilos/registro.css" rel="stylesheet" type="text/css" />
<!-- SCRIPTS -->
<script type="text/javascript" src="js/registro.js"></script>
<script type="text/javascript" src="js/md5.js"></script>
<?php

include('conexion.php');
include('cuerpo_pagina/cabecera.php');
include('cuerpo_pagina/menu_cliente.php');

include('cuerpo_pagina/menu_administrador.php');

?>
	<div id="formulario">
		<form action="registro.php" name="myform" method="get"  onsubmit="return validate();" >
				Nombre 
			<br/><input type="text"  name="nombre"  id="nombre" size="30"/><img class="asteris" id="asterisconombre" style="display:none" alt="" src="Imagenes/asterisco.png"/>	
			<br/><br/>
				Apellido
			<br/><input type="text" name="apellido"  id="apellido" size="30"/><img class="asteris" id="asteriscoapellido" style="display:none" alt="" src="Imagenes/asterisco.png"/>	
			<br/><br/>
				Año de nacimiento
			<br/><br/>
			<select name="anio" id="anio">
				<option value=""></option>
			</select><img class="asteriscoanio" id="asteriscoanio" style="display:none" alt="" src="Imagenes/asterisco.png"/>
			<br/><br/>
				Genero
			<img class="asterisgenero" id="asteriscogenero" style="display:none" alt="" src="Imagenes/asterisco.png"/>	
			<br/><br/>
			H<input type="radio" value="H" name="genero"/><br/>
			M<input type="radio" value="M" name="genero"/><br/>
			<br/><br/>
				Acepto las condiciones
			<br/><input type="checkbox" id="casilla" name="casilla"/><img class="asteriscondicion" id="asteriscocondicion" style="display:none" alt="" src="Imagenes/asterisco.png"/>	
			<br/><br/>
				Login
			<br/><input type="text" name="login"  id="login" size="30"/><img class="asteris" id="asteriscologin" style="display:none"  alt="" src="Imagenes/asterisco.png"/>
				<br/><br/>
				Password
			<br/><input type="password" name="password1"  id="password1" size="30"/><img class="asteris" id="asteriscopasswd1" style="display:none" alt="" src="Imagenes/asterisco.png"/>
			<br/><br/>
				Introduce de nuevo el password
			<br/><input type="password" name="password2"  id="password2" size="30"/><img class="asteris" id="asteriscopasswd2" style="display:none" alt="" src="Imagenes/asterisco.png"/>
			<br/><br/>
			<select name="poblacion" id="poblacion">
				<option value=''>Seleccionar</option>
				<?php
				     
				$consultados=("select idpoblacion , nompoblacion from poblacion order by nompoblacion asc");
				$resultadodos =mysql_query($consultados);
				while($filados=mysql_fetch_row($resultadodos))
				{
					echo"<option value='".$filados['0']."'>".$filados['1']."</option>";
				}
				?>
			</select>
			<input type="submit" value="Enviar" />
			<input type="reset" value="limpiar" />
		</form>
	</div>
<?php
include('cuerpo_pagina/pie.php');
?>
	