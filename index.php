<?php 
include('querys/generateTokenLoginRegister.php');
$url= $_SERVER["REQUEST_URI"];
$OkRegister = substr("$url", -10);

//cuenta activada
if(!empty($_GET['tokAct'])){
  $msjAccount="toastrDefaultSuccess"; 
  $functionAccount="activateAccount()";
}else{
  $msjAccount=""; 
  $functionAccount="";
}

//user register
if($OkRegister=="ErrAccount"){
  $msjToast="toastrDefaultError";
  $functionRegister="errorActivateAccount()";
}elseif($OkRegister=="ErroActive"){
  $msjToast="toastrDefaultError";
  $functionRegister="activeUserError()";
}elseif($OkRegister=="ErrExpirar"){
  $msjToast="toastrDefaultError";
  $functionRegister="ExpirationUserError()";
}elseif($OkRegister=="ErrorUsers"){
  $msjToast="toastrDefaultError";
  $functionRegister="errorUserPassword()";
}elseif($OkRegister=="ErrSession"){
  $msjToast="toastrDefaultInfo";
  $functionRegister="expiredSession()";
}else{
  $msjToast="";
  $functionRegister="";  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FonseCantero</title>

    <!-- Custom fonts for this template-->
    <link href="/FonseCantero/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/FonseCantero/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="/FonseCantero/plugins/toastr/toastr.min.css">
    <script src = "https://www.google.com/recaptcha/api.js?render=6LeHWKUUAAAAAM8yWXO9UezviIkwWlG439eFLjHv" > </script> <script>   grecaptcha . ready ( function () {       grecaptcha . execute ( '6LeHWKUUAAAAAM8yWXO9UezviIkwWlG439eFLjHv' , { action : ' login ' }). then ( function ( token ) { ... }); }); </script>

</head>

<body onload="<?php echo $functionRegister; ?> <?php echo $functionAccount; ?>" class="bg-gradient-primary hold-transition login-page <?php echo $msjToast; ?> <?php echo $msjAccount; ?>">
 
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicia sesión en tu cuenta</h1>
                                    </div>
                                    <form id="quickForm" class="user" action="/FonseCantero/querys/validationLogin" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Coloca tu correo..." autofocus>
                                            <input type="hidden" name="token" value="<?php echo"$token"; ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña">
                                        </div>
                                        
                                        <div class="form-group"></div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar sesión</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/FonseCantero/views/forgotPassword">&#191;Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/FonseCantero/views/register">Crea tu cuenta!!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/FonseCantero/vendor/jquery/jquery.min.js"></script>
    <script src="/FonseCantero/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/FonseCantero/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/FonseCantero/js/sb-admin-2.min.js"></script>
    <script src="/FonseCantero/js/jquery.validate.js"></script>
    <script src="/FonseCantero/js/validate.js"></script>
    <script src="/FonseCantero/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/FonseCantero/plugins/toastr/toastr.min.js"></script>
</body>
</html>