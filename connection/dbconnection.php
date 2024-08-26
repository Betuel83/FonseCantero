<?php 
date_default_timezone_set('America/Monterrey');

function getConnection() {
 try {
        $user = 'allanadc';
        $pwd = '';
        return new PDO('mysql:host=localhost;dbname=allanadc_fonsecantero', $user, $pwd);
     }
        catch(PDOException $e) {
            echo $e->getMessage();
     }
}
?> 