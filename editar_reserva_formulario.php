<!-- CSS -->
<link href="lib/jqueryui/css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet" type="text/css"/>
<!-- JS -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="lib/jqueryui/js/jquery-ui-1.9.0.custom.min.js"></script>

<script type="text/javascript" src="js/editar_reserva_formulario.js"></script>
<?php
include('conexion.php');
include('cuerpo_pagina/cabecera.php');
include('cuerpo_pagina/solo_registrado.php');
include('cuerpo_pagina/menu_cliente.php');
include('cuerpo_pagina/solo_cliente.php');

$hoy = date('Y-m-d');
$consultados=mysql_query("select *, MAX(`diafin`) as diafin, MIN(`diainicio`) as diainicio  FROM reservas  as r join usuario as u on  r.idusuario = u.idusuario join peliculas as p on r.idpeliculas = p.idpeliculas join sesiones  as s on s.idpeliculas = r.idpeliculas  WHERE r.idreservas ='".$_GET['cod']."' and r.idpeliculas = '".$_GET['idpeliculas']."' and s.diainicio >= '".$hoy."' ");
$filados =  mysql_fetch_array($consultados);
?>
<div id="editar_reserva_formulario">
	<form id='formulario' name='formulario'  action='editar_reserva.php' method='get' onsubmit='validate();'>
		<input type='hidden' id='idreservas' name='idreservas' value='".$filados['idreservas']."'/>
		<p class='titulo'>Editar Reservas</p>
		<h3>Idreserva :  </h3><?php echo $filados['idreservas']?><br />
		<h3>Cliente : </h3><?php echo $filados['nombre']?> <?php echo $filados['apellido']?><br />
		<h3>Pelicula : </h3><?php echo$filados['titulo']?>
		<input type='hidden' id='idpeliculas' name='idpeliculas' value='<?php echo $filados['idpeliculas']?>'/>
		<h3>Fecha : </h3>
		Eliga la fecha disponible de la pelicula.
		<br /><br />
		<input type='text' id='datepicker' name='datepicker' /><br /><br />
		<script type="text/javascript">
		$(function() 
		{
			$( "#datepicker" ).datepicker({dateFormat:"dd-mm-yy",minDate: new Date('<?php echo $filados['diainicio'];?>'), maxDate: new Date('<?php echo $filados['diafin'];?>')});
		});
		</script>
		<input type='button' value='Enviar Fecha' onclick='ajaxget();'>
		<br />
		<br />
		<div id='midiv'><!--muestro contenido ajax-->
		</div> 
		<br /><br />
		Eliga una butaca.
		<br /><br />
		<div id='sillas'></div>
		<br />
		<div id='EnvioButacas'></div>
		<input type='submit' value='Enviar Reseva'/>
	</form>
</div>
<?php
include('cuerpo_pagina/pie.php');
?>
