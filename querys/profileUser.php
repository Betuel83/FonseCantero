<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];

require '../connection/dbconnection.php';
$db = getConnection();

//extraemos el nombre del usuario que inicio sesion para mostrarlo en el home
try {
    $result_profile_user = $db->prepare('SELECT name FROM sys_register_users WHERE email=:email and password=:password');
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
    $result_profile_user->bindParam(':email', $email, PDO::PARAM_STR);
    $result_profile_user->bindParam(':password', $password, PDO::PARAM_STR);
    $result_profile_user->execute();
    $result_profile_user_fetch = $result_profile_user->fetch(PDO::FETCH_ASSOC);
}
    catch(PDOException $e) {
        echo $e->getMessage();
}
?>