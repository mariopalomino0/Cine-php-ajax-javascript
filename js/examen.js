

function ajaxget(){
var xmlhttp;
			
				var usuarios = document.getElementById("usuarios").value;
			  	if (usuarios == "")
				{ 
					alert("Eliga un usuario. ");
					return false;
				}
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
				 xmlhttp.open("GET","consultar_reserva_examen.php?idusuario="+usuarios,true);
		xmlhttp.send();	
}
