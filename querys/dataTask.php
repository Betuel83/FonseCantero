<?php
$user=$_SESSION['user'];

require '../connection/dbconnection.php';
$db = getConnection();

//extraemos las tareas activas de acuerdo al usuario que esta activo en la sesion
try {
    
    $res_tasks = $db->query('SELECT 
                             Id,
                             title,
                             description,
                             status,
                             date_format(date_create,"%d/%m/%Y") as date_create_task
                             FROM sys_tasks
                             WHERE user_create="'.$user.'" AND active=1
                             ORDER BY date_create');
    $res_tasks->execute();

}
    catch(PDOException $e) {
        echo $e->getMessage();
} 
?>