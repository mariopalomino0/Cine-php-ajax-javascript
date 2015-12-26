<?php
include('conexion.php');
if(isset($_GET['login']))
{
   $login=$_GET['login'];
}
else
{
   exit();
}

$consulta = ("SELECT  login FROM usuario WHERE login ='$login'"); 
$resultado = mysql_query($consulta) or die (mysql_error());

$bool = false;
if(mysql_num_rows($resultado) == 1)
{
   "El usuario " . $login  . "    existe.";
   $bool = true;
}
else
{
   "El usuario " . $login . "no existe.";
   $bool = false;
}
if($bool == true)
{
   $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
   
   $longitud = 8;
   $i = 0;
   $clave = "";
   while($i < $longitud)
   {
      $numrand = rand(0,strlen($caracteres)-1);
      $clave .= substr($caracteres,$numrand,1);
      $i++;
   }
   echo"<script type='text/javascript'>
		alert('La  clave es ". $clave ." gracias.');
		window.location='index.php';
		</script>";
   $encrippassword = md5($clave);
   $update = mysql_query("update usuario set password = '$encrippassword' where login  = '$login'");

}
?>
