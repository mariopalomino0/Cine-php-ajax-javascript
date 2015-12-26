// seleccionar año
function select() {

	var select = document.getElementById('anio');

	for (var i = 2012; i >= 1950; i--) 
	{
		select.options.add(new Option(i, i))
	}
}
window.onload = select;

// alta registro
function validate()
{
	var formulario = document.myform;
	var nombre = formulario.nombre.value;
	var apellido = formulario.apellido.value;
	var login = formulario.login.value;


	// nombre  //
		if(nombre.length == 0  )
		{
			alert("Ingrese nombre.");
			document.getElementById("asterisconombre").style.display ='block';					
			return false;
		}
		else
		{
			document.getElementById("asterisconombre").style.display ='none';
		}

	// apellido //
		if(apellido.length == ""  )
		{
			alert("Ingrese apellido.");	
			document.getElementById("asteriscoapellido").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscoapellido").style.display = 'none';
		}
		
                //anio//
		var indice = document.getElementById("anio").selectedIndex;
		if( indice == null || indice == 0 ) 
		{
			alert("Eliga un aÃ±o.");
			document.getElementById("asteriscoanio").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscoanio").style.display ='none';
		}
		
		
	// genero //
		var sexo="";
		for ( var i = 0; i < formulario.genero.length; i++ )
		{
			if( formulario.genero[i].checked )
			{
			   sexo=formulario.genero[i].value;
			   break;
			}
			
		}
		if(sexo=="")
		{ 
			alert("Eliga un genero.");
			document.getElementById("asteriscogenero").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscogenero").style.display ='none';
		}		

	
	// checkbox //
		if (!formulario.casilla.checked)
		 {
     		alert("Acepte las condiciones.");
			document.getElementById("asteriscocondicion").style.display ='block';
			return false; 
		 }
		 else
		 {
				document.getElementById("asteriscocondicion").style.display ='none';
		 }
	
	//login//
		if(login.length == "" || login.length < 6)
		{
			alert("Ingrese login 6 digitos como minimo login.");
			document.getElementById("asteriscologin").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscologin").style.display ='none';
		}
	
	
	// passwords 
	
		if (formulario.password1.value == "" || formulario.password2.value == "") 
		{
			alert("Los campos de la password no pueden quedar vacios");
			document.getElementById("asteriscopasswd1").style.display ='block';
			document.getElementById("asteriscopasswd2").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscopasswd1").style.display ='none';
			document.getElementById("asteriscopasswd2").style.display ='none';
		}
		
		if (formulario.password1.value.length < 8 && formulario.password2.value.length < 8)  
		{
			alert("8 digitos como minimo.");
			document.getElementById("asteriscopasswd1").style.display ='block';
			document.getElementById("asteriscopasswd2").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscopasswd1").style.display ='none';
			document.getElementById("asteriscopasswd2").style.display ='none';
		}
		if(formulario.password1.value!=formulario.password2.value)
		{
			alert("Clave distinta");
			document.getElementById("asteriscopasswd1").style.display ='block';
			document.getElementById("asteriscopasswd2").style.display ='block';
			return false;
		}
		else
		{
			document.getElementById("asteriscopasswd1").style.display ='none';
			document.getElementById("asteriscopasswd2").style.display ='none';
		}
		cadena = "(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,25})$";
		if(!formulario.password1.value.match(cadena) || !formulario.password2.value.match(cadena))
		{
			alert("El password debe ser alfanumerico.");
			document.getElementById("asteriscopasswd1").style.display ='block';
			document.getElementById("asteriscopasswd2").style.display ='block';
			return false;	
		}
		else
		{
			document.getElementById("asteriscopasswd1").style.display ='none';
			document.getElementById("asteriscopasswd2").style.display ='none';
		}
		
		
	

        // poblacion
        var indicepoblacion = document.getElementById("poblacion").selectedIndex;
		if( indicepoblacion == null || indicepoblacion == 0 ) 
		{
			alert("Eliga una población.");
                        return false;
		}
		
		// encriptacion password
		formulario.password1.value = hex_md5(formulario.password1.value);
		formulario.password2.value = hex_md5(formulario.password2.value);

		alert("Gracias por suscribirse.");	
		formulario.submit();
}	
function confirmacion(id)
{
        if(confirm('Desea eliminar el usuario?'))
        {
            window.location='eliminar_usuarios.php?cod='+id;
        } 
}