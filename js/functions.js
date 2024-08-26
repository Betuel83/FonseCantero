$(document).ready(function() {
    $("#tareasUsuario").click(function(event){
        $("#tareasUsuario").html("<i class='fas fa-fw fa-table'></i> Procesando...");
        $('#tareasUsuario').attr('id', 'noclick');
            $("#capa").load('/FonseCantero/views/tasks', function(){ 
                $('#noclick').attr('id', 'tareasUsuario');
                $("#tareasUsuario").html("<i class='fas fa-fw fa-table'></i> Tareas");	
            });
    });
});


function guardarRegistroTarea(){
$('#guardarTarea').attr('disabled', true);
    $("#guardarTarea").attr('value', 'Procesando...');
        document.getElementById('capa').innerHTML = '';
            $("#capa").load('/FonseCantero/views/saveTask.php');
}


function actualizarRegistroTarea(idTarea){
$('#actualizarTarea').attr('disabled', true);
    $("#actualizarTarea").attr('value', 'Procesando...');
        document.getElementById('capa').innerHTML = '';
            $("#capa").load('/FonseCantero/views/updateTask.php?idTarea=' + idTarea + '');
}


function cancelarActualizarRegistroTarea(){
$('#cancelar').attr('disabled', true);
    $("#cancelar").attr('value', 'Procesando...');
        document.getElementById('capa').innerHTML = '';
            $("#capa").load('/FonseCantero/views/tasks.php');
}


function GuardarRegistroTareaBD(){
    let titulo=document.getElementById("titulo").value;
    let descripcion=document.getElementById("descripcion").value;
    
    if(titulo===""){
      alert('Tienes que colocar el titulo de la tarea');
  	  return false;
    }

    if(descripcion===""){
      alert('Tienes que colocar la descipcion de la tarea');
  	  return false;
    }
    
    $('#guardar').attr('disabled', true);
    $("#guardar").attr('value', 'Guardando...');

    let formData = new FormData($("#frmGuardarTarea")[0]);
    $.ajax({
        type: 'POST',
        url: '/FonseCantero/querys/saveTaskIdBD.php',
        data: formData,
        dataType: "html",
        contentType: false,
        processData: false,
        success: function(datos){
            alert('Tarea Guardada!!');
            $("#capa").load('/FonseCantero/views/tasks.php');
        }
    });
}


function ActualizarRegistroTareaBD(){
    let titulo=document.getElementById("titulo").value;
    let descripcion=document.getElementById("descripcion").value;
    
    if(titulo===""){
      alert('Tienes que colocar el titulo de la tarea');
  	  return false;
    }

    if(descripcion===""){
      alert('Tienes que colocar la descipcion de la tarea');
  	  return false;
    }
    
    $('#actualizar').attr('disabled', true);
    $("#actualizar").attr('value', 'Actualizando...');

    let formData = new FormData($("#frmActualizarTarea")[0]);
    $.ajax({
        type: 'POST',
        url: '/FonseCantero/querys/updateTaskIdBD.php',
        data: formData,
        dataType: "html",
        contentType: false,
        processData: false,
        success: function(datos){
            alert('Tarea Actualizada!!');
            $("#capa").load('/FonseCantero/views/tasks.php');
        }
    });
}


function borrarRegistroTarea(idTarea){
    if (confirm("Deseas borrar esta tarea?") === true) {
    
        $('#borrarTarea'+idTarea).attr('disabled', true);
        $("#borrarTarea"+idTarea).attr('value', 'Borrando...');
    
        $.ajax({
            type: 'GET',
            url: '/FonseCantero/querys/deactivateTaskIdBD.php?idTarea=' + idTarea + '',
            success: function(datos){
                alert('Tarea Desactivada!!');
                $("#capa").load('/FonseCantero/views/tasks.php');
            }
        });
    
    }else{
        
        return false;
        
    }
}