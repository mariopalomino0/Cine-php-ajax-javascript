//funcion para confirmar eliminar reserva
function confirmacion(id,fecha,hora,butaca)
{
        if(confirm('Esta seguro que desea eliminar el  Id : ' + id +' Fecha :  '+ fecha +' Hora: ' + hora + ' Butaca : ' + butaca ))
        {
                window.location='eliminar_reserva.php?cod='+id;
        } 
}
