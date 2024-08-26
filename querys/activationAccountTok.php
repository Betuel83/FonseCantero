<?php
require '../connection/dbconnection.php';
$con = getConnection();

//el usuario cuando se registra tiene que confirmar su correo electronico con el cual se registro y ahi utilizamos el token que se creo al momento del regitro
//este token es unico por usuario el cual utilizamos para activar la confirmacion del correo al evento clic de un boton
try {
   $tokAct=$_GET['tokAct'];
   $confirm_email="Si";
   
   $update = $con->prepare('UPDATE sys_register_users SET confirm_email=:confirm_email WHERE tokenUser=:tokAct');
   $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //prevenir inyeccion sql
   $update->bindParam(':confirm_email', $confirm_email, PDO::PARAM_STR);
   $update->bindParam(':tokAct', $tokAct, PDO::PARAM_STR);
   
   if($update->execute()){
       
    echo '<script type="text/javascript">window.location.href="../index.php?tokAct='.$tokAct.'";</script>';   
    
   }else{
       
       echo '<script type="text/javascript">window.location.href="../index/register_success/ErRegister";</script>';
   }
    
}
    catch(PDOException $e) {
        echo $e->getMessage();
}
?>