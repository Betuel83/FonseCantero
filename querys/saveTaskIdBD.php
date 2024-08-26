<?php
session_start();
$user=$_SESSION['user'];

include("../connection/dbconnection.php");  //conexi贸n al server
$con = getConnection();

//variables post
$title=filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);
$description=filter_var($_POST['descripcion'], FILTER_SANITIZE_SPECIAL_CHARS);
$date=date('Y-m-d');
$hour=date('H:i:s');

//insertamos la tarea nueva con el estatus de pendiente por default y extraemos el usuario activo en la sesion para identificar que tarea pertenece a cada usuario
// y asi poder mostrar solo las tareas que le compete a cada usuario cuando inicie la sesion en el sistema
try {
    
    $insert = $con->query('INSERT INTO sys_tasks(
                           title,
                           description,
                           status,
                           user_create,
                           date_create,
                           hour_create,
                           active) 
                           VALUES 
                           ("'.$title.'",
                            "'.$description.'",
                            "Pendiente",
                            "'.$user.'",
                            "'.$date.'",
                            "'.$hour.'",
                            1)');

}
    catch(PDOException $e) {
        echo $e->getMessage();
} 
//fin
?>