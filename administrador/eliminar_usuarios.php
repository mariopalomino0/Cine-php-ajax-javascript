<?php
include('../conexion.php');

mysql_query("DELETE FROM usuario WHERE idusuario = '".$_GET['cod']."';");

echo"<script>
window.location='usuarios.php';
</script>";

?>