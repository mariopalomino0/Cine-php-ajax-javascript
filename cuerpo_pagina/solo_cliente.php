<?php
if($ADMIN == true)
{
    echo "<script type='text/javascript'>
    alert('Solo para clientes.');
    window.location='administrador/usuarios.php';
    </script>";
}
?>