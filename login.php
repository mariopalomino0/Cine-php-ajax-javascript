<?php
session_start();
include('conexion.php');

if(!empty($_GET['nom']) && !empty($_GET['password']))
{
    $login=$_GET['nom'];
    $password=$_GET['password'];
}
else
{
    exit();
}

$consulta = ("SELECT useradmin , idusuario, password, login FROM usuario WHERE login ='$login'"); 
$resultado = mysql_query($consulta) or die(mysql_error());
if(mysql_num_rows($resultado) != 0)
{ 
    // Bien, ahora que sabemos que existe, creamos un bucle para obtener los datos...
    	while($fila = mysql_fetch_array($resultado))
    	{
			
			if($password == $fila['password'] &&  $fila['useradmin'] === '0' ) 
			{
				$_SESSION['login'] = $fila["idusuario"];
				echo"<script type='text/javascript'>
				alert('Login y password correctos.');
				window.location='index.php';
				</script>";
			}
			if($password == $fila['password'] &&  $fila['useradmin'] === '1' ) 
			{
				$_SESSION['login'] = $fila["idusuario"];
				echo"<script type='text/javascript'>
				alert('Login y password correctos.');
				window.location='administrador/usuarios.php';
				</script>";
			}
			else 
			{ 
				echo"<script type='text/javascript'>
				alert('Password incorrecto.');
				window.location='index.php';
				</script>";
			} 
		}
}
else
{ 
    echo"<script type='text/javascript'>
    alert('Usuario no registrado.');
    window.location='registro_formulario.php';
    </script>";
}
?>

 
 
		
 
    	
