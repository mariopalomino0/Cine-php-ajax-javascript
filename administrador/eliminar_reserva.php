<?php
include('../conexion.php');
if( isset($_GET['cod'])  )
{
    $cod = $_GET['cod'];
    
}
else
{
    exit();
}
mysql_query("DELETE FROM reservas WHERE idreservas = '$cod';");


echo"<script>
window.location='reserva_administrador.php';
</script>";

?>
