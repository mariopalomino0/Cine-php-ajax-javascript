$(function() 
{
$( "#datepickerpasado" ).datepicker({maxDate:0,dateFormat:"dd-mm-yy"});
});

$(function() 
{
$( "#datepickerfuturo" ).datepicker({minDate:0,dateFormat:"dd-mm-yy"});
});


function ajaxgeti(){
var xmlhttp;
	var fechapasado =  document.getElementById("datepickerpasado").value;
	if(fechapasado == "")
	{
		alert("Ingrese una fecha.");
		return false;	
	}
	else
	{
		var todo_reserva = document.getElementById("todo_reserva").style.display='none';
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("midiv").innerHTML=xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","consultar_reserva.php?datepickerpasado="+fechapasado,true);
		xmlhttp.send();
	}
}
function ajaxgetii(){
var xmlhttp;
var fechafuturo =  document.getElementById("datepickerfuturo").value;

if(fechafuturo == "")
{
	alert("Ingrese una fecha.");
	return false;	
}
else
{
	var todo_reserva = document.getElementById("todo_reserva").style.display='none';
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("midiv").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","consultar_reserva.php?datepickerfuturo="+fechafuturo,true);
		xmlhttp.send();		
}
}
