<!-- css -->
<link href="../Estilos/general.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/peliculas.css" rel="stylesheet" type="text/css" />
<link href="../Estilos/cerrar_sesion.css" rel="stylesheet" type="text/css" />
<!-- SCRIPTS -->
<script type="text/javascript" src="../js/peliculas.js"></script>

<?php
include('../conexion.php');
include('../cuerpo_pagina/cabecera.php');
include('solo_registrado.php');
include('../cuerpo_pagina/solo_administrador.php');
include('../cuerpo_pagina/menu_administrador.php');


$consultados=mysql_query("SELECT * FROM peliculas WHERE idpeliculas ='".$_GET['cod']."'");
$filados = mysql_fetch_array($consultados);
?>
<div id="peliculas">
<p class="titulo">Editar Peliculas</p>

<form action="editar_peliculas.php" method="post" id="editar_peliculas_formulario" name="editar_peliculas_formulario" enctype="multipart/form-data" onsubmit="return validate_editar_peliculas_formulario();"/>
<input type="hidden" name="cod" id="cod" value="<?php echo $_GET['cod'];?>" /><!--Enviamos el codigo-->
<input type="hidden" name="foto" id="foto" value="<?php echo $filados['foto'];?>" /><!--Enviamos la foto para poder hacer UPDATE-->
<input type="hidden" name="MAX_FILE_SIZE" value="10000000"> 
<br /><br />
Titulo
<br /><br />
<input type="text" name="titulo" id="titulo" value="<?php echo $filados['titulo']; ?>" size="30"/>
<br /><br />
Foto
<br /><br />
<input type="file" name="foto" id="foto" value="../Imagenes/peliculas/<?php echo $filados['foto'];?>"/>
<br />
<br />
<img src= "../Imagenes/peliculas/<?php echo $filados['foto'];?>" width="200" heigth="200"/>
<br /><br />
Descripcion
<br /><br />
<textarea rows="8" cols="50" name="descripcion" id="descripcion" size="30" ><?php echo $filados['descripcion']; ?></textarea>
<br /><br />
Link
<br /><br />
<input type="text" name="link" id="link" value="<?php echo $filados['link']; ?>" size="30" />
<br /><br />
<input type="submit" value="Enviar" id="submit" name="submit"/>
</form>
</div><!--pie de div id peliculas -->
<?php

include('../cuerpo_pagina/pie.php');
?>
