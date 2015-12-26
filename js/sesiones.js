$(function() 
{
	$( "#datepickerini" ).datepicker({minDate:0,dateFormat:"dd-mm-yy"});
});

	$(function() 
{
	$( "#datepickerfin" ).datepicker({minDate:0,dateFormat:"dd-mm-yy"});
});


function validate()
{
		var formulario = document.getElementById('sesiones_formulario');
		var pelicula = document.getElementById("pelicula").selectedIndex;
		if( pelicula == null || pelicula == 0 ) 
		{
			alert("Ingrese una pelicula.");
			return false;
		}
		if(formulario.datepickerini.value == "")
		{
			alert("Ingrese un dia de inicio.");
			return false;
		}
		if(formulario.datepickerfin.value == "")
		{
			alert("Ingrese una dia final.");
			return false;
		}
		if(formulario.datepickerini.value > formulario.datepickerfin.value )
		{
			alert("Error al escoger el rango de fechas.");
			return false;
		}
		var casilla = document.getElementsByName('casilla[]');
		var hasChecked = false;
		for (var i = 0; i < casilla.length; i++)
		{
			if (casilla[i].checked)
			{
				hasChecked = true;
				break;
			}
		}
		if (hasChecked == false)
		{
			alert("Ingrese al menos una hora.");
			return false;
		}
		else
		{
			return true;
		}
		
		formulario.submit();
}
