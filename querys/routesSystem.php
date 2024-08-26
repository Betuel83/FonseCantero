<?php
$con = getConnection();

//extraemos las ruta predefinida para utilizarla en el envio de correos, esta ruta la utilizamos en el file_get_contents del cuerpo del envio del correo
try {
    $result_routes = $con->query('SELECT route FROM sys_predefined_routes WHERE active=1 LIMIT 1');
    $result_routes->execute();
}
    catch(PDOException $e) {
        echo $e->getMessage();
}
?>