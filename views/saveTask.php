<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FonseCantero</title>
    <!-- Custom styles for this template-->
    <link href="/FonseCantero/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary hold-transition login-page">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-save-task-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><u><i>Nueva Tarea</i></u></h1>
                            </div>
                            <!--<form id="quickForm" class="user" action="/FonseCantero/querys/validateStudent" method="post">-->
                            <form onsubmit="return false" name="frmGuardarTarea" id="frmGuardarTarea" method="post">
                                    <div class="form-group">
                                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion">
                                    </div>
                               <input type="button" class="btn btn-success btn-user btn-block" onclick="GuardarRegistroTareaBD();" name="guardar" id="guardar" value="Guardar">
                               <input type="button" class="btn btn-primary btn-user btn-block" onclick="cancelarActualizarRegistroTarea();" name="cancelar" id="cancelar" value="Cancelar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>