<?php
//creamos un token que esta en un input oculto en el login y en el formulario de registro para evitar ataques csrf
//este token cambia de acuerdo a la fecha y cada hora mas la ip del cliente que esta tratando de utilizar la app web
$ip_client=$_SERVER['REMOTE_ADDR'];
$date=date('Y-m-d');
$hour = date('H');
$description = 'FonseCantero/Login/Register';
$token = hash('sha256', $date.$hour.$description.$ip_client);
?>