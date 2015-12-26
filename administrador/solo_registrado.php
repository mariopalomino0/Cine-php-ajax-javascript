<?php
if(isset($_SESSION['login']))
{
    $login = $_SESSION['login'];
}
else
{
    echo "<script type='text/javascript'>
    alert('No tienes acceso a esta pagina es solo para administradores.');
    window.location='../index.php';
    </script>";
    $login = '';
}
?>