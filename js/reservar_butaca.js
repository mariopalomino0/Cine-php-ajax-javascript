
function inicio() {

	var sillas = document.getElementById('sillas');/*seleccionamos el div id = sillas*/
	var y = 1;/*variable para columna*/
	var x = 1;/*variable para fila*/
	var sillaLibre= "Imagenes/libre.png";/*seleccionamos la imagen libre*/
	var sillaSeleccionado= "Imagenes/seleccionado.png";/*seleccionamos la imagen seleccionada*/ 
	var sillaOcupada= "Imagenes/ocupado.png";
	var imagenLibre = document.createElement("img");/*creamos la imagen libre*/	
	imagenLibre.src=sillaLibre;/*la direccion de la imagen creada*/
	var imagenSeleccionado = document.createElement("img");
	imagenSeleccionado.src=sillaSeleccionado;
	var imagenOcupada = document.createElement("img");
	imagenOcupada.src=sillaOcupada;
	var contadorSeleccionado = 0;/*contar las seleccionadas*/
	for(var i=1;i<101;i++)
	{
		var imagen = document.createElement("img");	
		imagen.id = i;
		imagen.src = "Imagenes/libre.png";
		imagen.onclick = function()/*funcion onclick*/ 
		{
			
			var ButacaCompleta = this.title;/*titulo de cada butaca con fila y columna respectiva*/
			if(ButacaCompleta=="bloqueado")
			 exit;
			var IdButaca  = this.id;/*id de cada butaca*/
			if (this.src==imagenLibre.src)
			{

				this.src = "Imagenes/seleccionado.png";
				contadorSeleccionado++;
				
				var divEnvioButacas = document.getElementById('EnvioButacas');
				var br = document.createElement("br");
				var input = document.createElement('input');
				input.size = '1';
				input.type = 'hidden';
				input.name = 'butaca[]';
				input.value = IdButaca;
				input.id = IdButaca+"silla";
				divEnvioButacas.appendChild(input);
				
			}
			else
			{
				
				this.src = "Imagenes/libre.png";
				contadorSeleccionado--;
				
				var divEnvioButacas = document.getElementById('EnvioButacas');
				var Id = this.id+"silla";
				var EliminarId = document.getElementById(Id);
				EliminarId.parentNode.removeChild(EliminarId);
				
			}
			
			
		}
		sillas.appendChild(imagen);
		
		if(x==10)
		{
			var br = document.createElement("br");
			imagen.title = " Butaca "+i+" Columna "+x+" Fila "+y;
			sillas.appendChild(br);
			var x=1;
			y++;
		}
		else
		{
			imagen.title = " Butaca "+i+" Columna "+x+" Fila "+y;
			x++;
		}
	}
	/*ocupados bloquear*/
	for(var i=0;i < bloqueados.length; i++)
	{
		document.getElementById(bloqueados[i]).src="Imagenes/ocupado.png";
		document.getElementById(bloqueados[i]).title="butaca reservada";
	} 
	

}

window.onload = inicio;

function validate()
{
	var butaca=document.getElementsByName("butaca[]"); 
	if(butaca.length == 0)
	{
		alert("Eliga una butaca");	
		return false;
	}
	else
	{
		return true;
	}
	formulario.submit();
}