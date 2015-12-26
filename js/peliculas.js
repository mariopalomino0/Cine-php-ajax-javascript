//funcion para onfirmar eliminar
function confirmacion(id,titulo,foto,link)
{
        if(confirm('Esta seguro que desea eliminar el  Id : ' + id +' Titulo:  '+ titulo +' Foto : ' + foto + ' Link : ' + link ))
        {
                window.location='eliminar_peliculas.php?cod='+id+'&foto='+foto;
        } 
}
//funcion de la pagina peliculas_formulario.php
function validate_peliculas_formulario()
{
	var formulario = document.getElementById('peliculas_formulario');
	if(formulario.titulo.value == "")
	{
		alert("Ingrese un titulo.");
		return false;
	}
	if(formulario.foto.value == "")
	{
		alert("Ingrese una imagen.");
		return false;
	}
	if(formulario.descripcion.value == "")
	{
		alert("Ingrese una descripcion.");
		return false;
	}
	if(formulario.link.value == "")
	{
		alert("Ingrese un link.");
		return false;
	}
	
	formulario.submit();
}
//funcion de la pagina editar_peliculas_formulario.php
function validate_editar_peliculas_formulario()
{
	var formulario = document.getElementById('editar_peliculas_formulario');
	if(formulario.titulo.value == "")
	{
		alert("Ingrese un titulo.");
		return false;
	}
	if(formulario.foto.value == "")
	{
		alert("Ingrese una imagen.");
		return false;
	}
	if(formulario.descripcion.value == "")
	{
		alert("Ingrese una descripcion.");
		return false;
	}
	if(formulario.link.value == "")
	{
		alert("Ingrese un link.");
		return false;
	}
	
	formulario.submit();
}
