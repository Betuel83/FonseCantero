<?php
session_start();
$user=$_SESSION['user'];

require '../connection/dbconnection.php';
$db = getConnection();
$date=date('Y-m-d');
$hour=date('H:i:s');

//actualizamos la tarea que selecciono el usuario
try {
    
    $idTarea=filter_var($_POST['idTarea'], FILTER_SANITIZE_SPECIAL_CHARS);
    $title=filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);
    $description=filter_var($_POST['descripcion'], FILTER_SANITIZE_SPECIAL_CHARS);
    $status=filter_var($_POST['estatus'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    $res_update_task_id = $db->query('UPDATE sys_tasks 
                                      SET title="'.$title.'",
                                      description="'.$description.'",
                                      status="'.$status.'",
                                      user_modified="'.$user.'",
                                      date_modified="'.$date.'",
                                      hour_modified="'.$hour.'"
                                      WHERE Id="'.$idTarea.'"
                                      AND user_create="'.$user.'"
                                      AND active=1');
    $res_update_task_id->execute();

}catch(PDOException $e) {
        echo $e->getMessage();
}    
?>