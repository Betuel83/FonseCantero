<?php
session_start();
unset($email);
unset($password);
unset($tokenUser);
unset($user);

session_destroy();
//cerramos la sesion del usuario
$parametros_cookies = session_get_cookie_params();
setcookie(session_name(),0,1,$parametros_cookies["path"]);
$_SESSION = array();
HEADER("Location:../index"); // regresa al inicio
?>