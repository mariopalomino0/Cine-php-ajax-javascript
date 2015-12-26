// function verificacion de password
function password()
{
	var formulario = document.getElementById('myform');
	
	if(formulario.login.value == "")
	{
		alert("Campo vacio ingrese login.");
		document.getElementById("asterislogin").style.display='block';
		return false;
		
	}
	
	alert("Datos enviados correctamente.")
	formulario.submit();
}
