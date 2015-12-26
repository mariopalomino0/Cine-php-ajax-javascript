<?php
if($ADMIN == false)
{
	echo "<script type='text/javascript'>
	alert('No tienes acceso a esta pagina es solo para administradores.');
	window.location='../index.php';
	</script>";
}

?>