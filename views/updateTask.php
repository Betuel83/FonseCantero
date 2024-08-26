<?php 
session_start();
$idtarea = $_GET['idTarea'];

include '../querys/updateTaskId.php';

foreach ($res_update_tasks as $tasks_update):
    
endforeach;
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
    <!-- Custom styles for this template-->
    <link href="/FonseCantero/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary hold-transition login-page">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-update-task-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><u><i>Actualizar Tarea</i></u></h1>
                            </div>
                            <!--<form id="quickForm" class="user" action="/FonseCantero/querys/validateStudent" method="post">-->
                            <form onsubmit="return false" name="frmActualizarTarea" id="frmActualizarTarea" method="post">
                                    <div class="form-group">
                                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $tasks_update['title']; ?>" placeholder="Titulo" autofocus>
                                        <input type="hidden" name="idTarea" id="idTarea" class="form-control" value="<?php echo $tasks_update['Id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $tasks_update['description']; ?>" placeholder="Descripción">
                                    </div>
                                    <div class="form-group">
                                    <select name="estatus" id="estatus" class="form-control"><br>
                                      <?
                                      switch($tasks_update['status'])
                                      {
                                      case 'Pendiente':
                                      echo"<option value='Pendiente' selected>Pendiente</option>";
                                      echo"<option value='En progreso'>En progreso</option>";
                                      echo"<option value='Completada'>Completada</option>";
                                      break;
                                    
                                      case 'En progreso':
                                      echo"<option value='Pendiente'>Pendiente</option>";
                                      echo"<option value='En progreso' selected>En progreso</option>";
                                      echo"<option value='Completada'>Completada</option>";
                                      break;
                                      
                                      case 'Completada':
                                      echo"<option value='Pendiente'>Pendiente</option>";
                                      echo"<option value='En progreso'>En progreso</option>";
                                      echo"<option value='Completada' selected>Completada</option>";
                                      break;
                                      }
                                      echo "</select>";
                                      ?>
                                      </div>
                               <input type="button" class="btn btn-success btn-user btn-block" onclick="ActualizarRegistroTareaBD();" name="actualizar" id="actualizar" value="Actualizar">
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