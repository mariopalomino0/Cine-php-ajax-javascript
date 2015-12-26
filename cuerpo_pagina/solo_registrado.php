<?php
if(isset($_SESSION['login']))
{
    $login = $_SESSION['login'];
}
else
{
    echo "<script type='text/javascript'>
    alert('Tienes que estar registrado para poder hacer las reservas.');
    window.location='index.php';
    </script>";
    $login = '';
}
?>