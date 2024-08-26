<?php
session_start();

if (empty($_SESSION['tokenUser'])) {
    echo '<script type="text/javascript">window.location.href="/FonseCantero/index/expire/ErrSession";</script>';
    die('');
}

include '../querys/dataTask.php';
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

    <!-- Custom fonts for this template -->
    <link href="/FonseCantero/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/FonseCantero/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/FonseCantero/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Tareas</h6>
                        </div>
                        <div class="card-body">
                            <input class="btn btn-info btn-sm" type="button" name="guardarTarea" id="guardarTarea" onclick="guardarRegistroTarea();" value="Nuevo" />
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Estatus</th>
                                            <th>Actualizar</th>
                                            <th>Desactivar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Estatus</th>
                                            <th>Actualizar</th>
                                            <th>Desactivar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $i=1; 
                                            foreach ($res_tasks as $tasks_user): 
                                            
                                            //validamos que estatus esta la tarea para asignarle un color a dicho estatus
                                            //validamos si la tarea este en estatus pendiente, si es asi habilito el boton para desactivar en caso contrario lo deshabilito
                                            //si esta pendiente puedo borrar la tarea por si esa tarea no se requiere, pero si ya se esta trabajando como en progreso o completada no se puede borrar
                                            //si la tarea esta pendiente o en progreso lo puedo editar pero si ya esta completada ya no es posible poder modificar
                                            if($tasks_user['status']==="Pendiente"){
                                                $status_color="#c0392b";
                                                $habilitar_boton_editar="enabled";
                                                $habilito_boton_borrar="enabled";
                                            }elseif($tasks_user['status']==="En progreso"){
                                                $status_color="#2980b9";
                                                $habilitar_boton_editar="enabled";
                                                $habilito_boton_borrar="disabled";
                                            }else{
                                                $status_color="#16a085";
                                                $habilitar_boton_editar="disabled";
                                                $habilito_boton_borrar="disabled";
                                            }
                                        ?>
                                        
                                        <tr>
                                            <td><center><?php echo $i; ?></center></td>
                                            <td><?php echo $tasks_user['title']; ?></td>
                                            <td><?php echo $tasks_user['description']; ?></td>
                                            <td><center><?php echo $tasks_user['date_create_task']; ?></center></td>
                                            <td><center><font color="<?php echo $status_color; ?>"><?php echo $tasks_user['status']; ?></font></center></td>
                                            <td><center><input class="btn btn-info btn-sm" type="button" name="actualizarTarea" id="actualizarTarea" onclick="actualizarRegistroTarea('<?php echo $tasks_user['Id']; ?>');" value="Editar" <?php echo $habilitar_boton_editar; ?>/></center></td>
                                            <td><center><input class="btn btn-danger btn-sm" type="button" name="borrarTarea" id="borrarTarea<?php echo $tasks_user['Id']; ?>" onclick="borrarRegistroTarea('<?php echo $tasks_user['Id']; ?>');" value="Borrar" <?php echo $habilito_boton_borrar; ?>/></center></center></td>
                                        </tr>
                                        
                                        <?php 
                                            $i++;
                                            endforeach;  
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/FonseCantero/vendor/jquery/jquery.min.js"></script>
    <script src="/FonseCantero/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/FonseCantero/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/FonseCantero/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/FonseCantero/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/FonseCantero/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/FonseCantero/js/demo/datatables-demo.js"></script>

</body>

</html>