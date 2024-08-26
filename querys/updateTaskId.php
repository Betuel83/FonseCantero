<?php
$user=$_SESSION['user'];

require '../connection/dbconnection.php';
$db = getConnection();

//extraemos la tarea de acuerdo al usuario en la sesion y que este activa dicha tarea para poder realizar la modificacion de la informacion
try {
    
    $res_update_tasks = $db->query('SELECT 
                                    Id,
                                    title,
                                    description,
                                    status
                                    FROM sys_tasks
                                    WHERE user_create="'.$user.'" AND Id="'.$idtarea.'" AND active=1
                                    ORDER BY date_create');
    $res_update_tasks->execute();

}
    catch(PDOException $e) {
        echo $e->getMessage();
} 
?>