<?php
session_set_cookie_params(60*60*24*2);
session_start();

require '../connection/dbconnection.php';
$db = getConnection();
$current_date=date('Y-m-d');

try {
    $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $passwordHash=md5($_POST['password']);
    $password=hash("sha512", $passwordHash);
    $active=1;
    
    //validamos que el correo este confirmado
    $res_account = $db->prepare('SELECT confirm_email FROM sys_register_users WHERE email=:email');
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
    $res_account->bindParam(':email', $email, PDO::PARAM_STR);
    $res_account->execute();
    $result_account = $res_account->fetch(PDO::FETCH_ASSOC);
    
    if(empty($result_account['confirm_email'])){
        
        echo '<script type="text/javascript">window.location.href="../index/errorUser/ErrorUsers";</script>';
        die('');
        
    }elseif($result_account['confirm_email']==="No"){ 
        
        echo '<script type="text/javascript">window.location.href="../index/errorAccount/ErrAccount";</script>';
        die('');
        
    }else{
        
        echo'';
        
    }
    //fin
    
    
    //validamos la fecha de expiracion no sea menor que la fecha actual
    $res_date_expiration = $db->prepare('SELECT expiration_date_demo FROM sys_register_users WHERE email=:email');
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
    $res_date_expiration->bindParam(':email', $email, PDO::PARAM_STR);
    $res_date_expiration->execute();
    $result_date_expiration = $res_date_expiration->fetch(PDO::FETCH_ASSOC);
    
    if(empty($result_date_expiration['expiration_date_demo'])){
        
        echo '<script type="text/javascript">window.location.href="../index/errorUser/ErrorUsers";</script>';
        die('');
        
    }elseif($current_date>=$result_date_expiration['expiration_date_demo']){
        
        echo '<script type="text/javascript">window.location.href="../index/active/ErrExpirar";</script>';
        die('');
        
    }else{
        
        echo'';
        
    }
    //fin
    
    
    //validamos que el usuario y la contraseña sean veridicos
    $res_validate = $db->prepare('SELECT Id,email,tokenUser FROM sys_register_users WHERE email=:email and password=:password and active=:active');
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
    $res_validate->bindParam(':email', $email, PDO::PARAM_STR);
    $res_validate->bindParam(':password', $password, PDO::PARAM_STR);
    $res_validate->bindParam(':active', $active, PDO::PARAM_STR);
    $res_validate->execute();
    $result_validate = $res_validate->fetch(PDO::FETCH_ASSOC);
    
    if(empty($result_validate['email'])){
        
        echo '<script type="text/javascript">window.location.href="../index/errorUser/ErrorUsers";</script>';
        die('');
        
    }else{
        
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = hash("sha512", md5($_POST['password']));
        $_SESSION['tokenUser']=$result_validate['tokenUser'];
        $_SESSION['user']=$result_validate['Id'];
        $_POST['email'];
        md5($_POST['password']);
        
        echo '<script type="text/javascript">window.location.href="../views/home";</script>';
        
    }
    //fin
}
    catch(PDOException $e) {
        echo $e->getMessage();
}
?>