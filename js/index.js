//login de Index
 function envio() 
{
	var formulario = document.getElementById('login');
	if(formulario.nom.value == "" || formulario.nom.value.length < 6)
	{
		alert("Ingrese login mayor a 6 digitos");
		document.getElementById("asterisnom").style.display='block';
		return false;
	}
	else
	{
		document.getElementById("asterisnom").style.display='none';
	}
	if(formulario.password.value == "")
	{
		alert("Ingrese password.");
		document.getElementById("asterispass").style.display='block';
		return false;
	}
	else
	{
		document.getElementById("asterispass").style.display='block';
	}
	
	alert("Se enviaron los datos correctamente");
	formulario.password.value = hex_md5(formulario.password.value);// encriptacion de password
	formulario.submit();
}
