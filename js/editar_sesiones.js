
function confirmacion_dia(dia,idsesion,idpeliculas)
{
        if(confirm('Desea eliminar el dia '+dia+' ? ' ))
        {
            window.location='editar_sesiones_dia.php?dia='+dia+'&idsesion='+idsesion+'&idpeliculas='+idpeliculas;
        } 
}
function confirmacion_hora(hora,dia,idsesion,idpeliculas)
{
        if(confirm('Desea eliminar la hora '+hora+' del dia '+dia+' ? '))
        {
            window.location='editar_sesiones_hora.php?hora='+hora+'&dia='+dia+'&idsesion='+idsesion+'&idpeliculas='+idpeliculas;
        } 
}
$(function() 
{
	$( "#datepickerin" ).datepicker({minDate:0,dateFormat:"dd-mm-yy"});
});

	$(function() 
{
	$( "#datepickerfi" ).datepicker({minDate:0,dateFormat:"dd-mm-yy"});
});




function validate()
{
		var formulario = document.getElementById('sesiones_formulario');
		
		if(formulario.datepickerin.value == "")
		{
			alert("Ingrese un dia de inicio.");
			return false;
		}
		if(formulario.datepickerfi.value == "")
		{
			alert("Ingrese una dia final.");
			return false;
		}
		if(formulario.datepickerin.value > formulario.datepickerfi.value )
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
