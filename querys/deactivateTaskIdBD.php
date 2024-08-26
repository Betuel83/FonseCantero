<?php
session_start();
$user=$_SESSION['user'];

require '../connection/dbconnection.php';
$db = getConnection();
$date=date('Y-m-d');
$hour=date('H:i:s');

//actualizamos la tarea de acuerdo al Id unico de dichas tareas
try {
    
    $idTarea=filter_var($_GET['idTarea'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    $res_update_task_id = $db->query('UPDATE sys_tasks 
                                      SET active="0",
                                      user_deactivate="'.$user.'",
                                      date_deactivate="'.$date.'",
                                      hour_deactivate="'.$hour.'"
                                      WHERE Id="'.$idTarea.'"
                                      AND user_create="'.$user.'"
                                      AND active=1');
    $res_update_task_id->execute();

}
    catch(PDOException $e) {
        echo $e->getMessage();
}    
?>