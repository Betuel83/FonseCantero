<?php
//generamos el token nuevamente para compararlo nuevamente
include('generateTokenLoginRegister.php');
include('../connection/dbconnection.php');  //conexi贸n al server
include('../querys/routesSystem.php');
$con = getConnection();

//extraemos la ruta predeterminada para enviar el html por correo
foreach ($result_routes as $route): 
    $route = $route['route']; 
endforeach;

//variables post
$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$tokenRegister=$_POST['tokenRegister'];

//validamos que el token no se haya modificado y coincida con el que genero el sistema
if($token!=$tokenRegister){
    echo '<script type="text/javascript">window.location.href="../views/register/registerSuccess/ErRegister";</script>';
    die("");
}
//fin


//validamos que el correo no este registrado
try {
    $result_email_user = $con->prepare('SELECT email FROM sys_register_users WHERE email=:email');
    $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
    $result_email_user->bindParam(':email', $email, PDO::PARAM_STR);
    $result_email_user->execute();
    $result_email_user_fetch = $result_email_user->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($result_email_user_fetch['email'])){
    echo '<script type="text/javascript">window.location.href="../views/register/registerSuccess/ErRegEmail";</script>'; 
    die("");
    }
}
    catch(PDOException $e) {
        echo $e->getMessage();
}
//fin

//insertamos los datos para crear la cuenta
   try {
   //variables post
   $name=filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
   $tokenRegister=$_POST['tokenRegister'];
   $last_name=filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
   $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $password=md5($_POST['repassword']);
   $passwordHash=hash("sha512", $password);
   $date_register=date('Y-m-d');
   $hour_register=date('H:i:s');
   $nomenclature="sys_fonsecantero_tareas";
   $union=md5($date_register.$hour_register.$email.$password.$name.$last_name.$nomenclature);
   $tokenUser = hash("sha512", $union);
   $expiration_date_demo=date("Y-m-d",strtotime($date_register."+ 14 days")); //14 dias maximo de demo
   $confirm_email="No";
   $active=1;
   $demo="Si";
   $ip_user=$_SERVER['REMOTE_ADDR'];
   
   $insert = $con->prepare('INSERT INTO sys_register_users 
                         (name, 
                         last_name,
                         email, 
                         password, 
                         tokenUser,
                         date_register,
                         hour_register,
                         ip_user,
                         demo,
                         expiration_date_demo,
                         confirm_email,
                         active) 
                         VALUES 
                         (:name, 
                         :last_name, 
                         :email, 
                         :passwordHash, 
                         :tokenUser,
                         :date_register, 
                         :hour_register, 
                         :ip_user, 
                         :demo,
                         :expiration_date_demo,
                         :confirm_email,
                         :active)');
   $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
   $insert->bindParam(':name', $name, PDO::PARAM_STR);
   $insert->bindParam(':last_name', $last_name, PDO::PARAM_STR);
   $insert->bindParam(':email', $email, PDO::PARAM_STR);
   $insert->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
   $insert->bindParam(':tokenUser', $tokenUser, PDO::PARAM_STR);
   $insert->bindParam(':date_register', $date_register, PDO::PARAM_STR);
   $insert->bindParam(':hour_register', $hour_register, PDO::PARAM_STR);
   $insert->bindParam(':ip_user', $ip_user, PDO::PARAM_STR);
   $insert->bindParam(':demo', $demo, PDO::PARAM_STR);
   $insert->bindParam(':expiration_date_demo', $expiration_date_demo, PDO::PARAM_STR);
   $insert->bindParam(':confirm_email', $confirm_email, PDO::PARAM_STR);
   $insert->bindParam(':active', $active, PDO::PARAM_STR);
   
   if($insert->execute()){
       
    echo '<script type="text/javascript">window.location.href="../views/successfulRecord";</script>';   
    
    //enviamos un correo para que el usuario lo confirme y pueda entrar al sistema
    $body = file_get_contents("$route/views/activateAccount.php?tok=$tokenUser");
    require("../mailer/src/PHPMailer.php");
    require("../mailer/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->SMTPDebug = 2;
    $mail->setFrom('noreply@allanad.com'); // Dirección de la que llegan los mensajes. Debe ser igual a la configurada para envíos.
    $mail->FromName = 'FonseCantero';
    $mail->AddAddress($email); // Dirección a la que llegaran los mensajes.

    // Aquí van los datos que apareceran en el correo que reciba
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject  =  "Activacion Cuenta";
    $mail->Body =  $body;

    // Datos del servidor SMTP
    $mail->IsSMTP();
    $mail->Host = "mail.allanad.com";  // Servidor de Salida.
    $mail->SMTPAuth = true; // Autenticación SMTP activada
    $mail->SMTPSecure = 'tls'; // Seguridad SMTP
    $mail->Port = 587; // Puerto de autenticación
    $mail->Username = "noreply@allanad.com";  // Correo Electrónico que envía correo
    $mail->Password = "-- ******* --"; // Contraseña de cuenta de correo

    $mail->Send();
    
   }else{
       
       echo '<script type="text/javascript">window.location.href="../register/registerSuccess/ErRegister";</script>';
   }
    
 }
       catch(PDOException $e) {
       echo $e->getMessage();
       echo '<script type="text/javascript">window.location.href="../register/registerSuccess/ErRegister";</script>';
       
 }
?>