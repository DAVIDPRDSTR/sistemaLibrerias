<?php
session_start();
include '../Datos/conexion.php';

$usuario = $_SESSION['usuario'];
if ($usuario == "") {
    header("Location:Login.php");
}
$sql = "select * from usuario where email='$usuario'";
$query = $pdo->prepare($sql);
$query->execute();
$resultadoU = $query->fetchAll();

foreach ($resultadoU as $resU) {

    $nombreU = $resU['nombres'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Editorial</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../Template/css/bootstrap.min.css" />
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../Template/css/styles.css" />

        <link rel="stylesheet" href="../Template/css/w3.css" />
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header" style="height:60px;">
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="#CompanySubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Mantenimientos
                        </a>
                        <ul class="collapse list-unstyled" id="CompanySubmenu">
                            <li><a href="../crud_libro/index.php">Usuarios</a></li>
                            <li><a href="../CRUD_PHP_AUTOR/index.php">Autores</a></li>
                            <li><a href="../crud_libro/index.php">Libros</a></li>
                            <li><a href="lista_editoriales.php">Editorial</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Reportes
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Sale Order</a></li>
                            <li><a href="#">Sale Receipt</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-send"></i>
                            Soporte
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content Holder -->
            <div id="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header" style="width: 250px;">
                            <div style="float: left; width: 84%">
                                <h3>
                                    <a href="#">
                                        <img src="../Template/images/eangkor.png" alt="E ANGKOR YOUTUBE CHANNEL" width="40" style="padding: 0 5px 0 5px;" />EANGKOR
                                    </a>
                                </h3>
                            </div>
                            <div style="float: right; width: 15%; padding-top: 0px;">
                                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                    <i class="glyphicon glyphicon-align-left"></i>
                                </button>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="false" style="background: #ffffff;">
                                        <img id="userimg" src="../Template/images/default.png" alt="user-img" class="img-circle" width="30" style="border: 1px solid" />
                                    </a>
                                    <ul class="dropdown-menu" style="padding: 10px;">
                                        <li><a href="#" style="background: #ffffff;"><i class="glyphicon glyphicon-user"></i> <?php echo $nombreU; ?></a></li>
                                        <li class="divider"></li>
                                        <li id="changepassword"><a href="#" style="background: #ffffff;"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="../Controlador/CerrarSesion.php" class="btn btn-default btn-flat" style="background:#ef0707 ;color:#fff;width:100%;">cerrar sesion</a>

                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--                  **********************  NUEVA EDITORIAL**************************-->
                <!--                  **********************   ACTUALIZAR**************************-->
                <?php
                if ($_GET != null) {
                    $codEditorial = $_GET['id_editorial'];
                    $sql = "select * from editorial where id_editorial=$codEditorial";
                    $sqlQuery = $pdo->prepare($sql);
                    $sqlQuery->execute();
                    $resultadoModEditorial = $sqlQuery->fetchAll();
                    foreach ($resultadoModEditorial as $datos) {
                        $cod_ed = $datos['id_editorial'];
                        $nombre_ed = $datos['nombre'];
                        $direccion_ed = $datos['direccion'];
                        $correo_ed = $datos['email'];
                        $estado_ed = $datos['estado'];
                        $pais_ed = $datos['id_pais'];
                        
                    }
                    ?>

                    <form action="Controlador_editorial/Editorial.php" method="POST">
                        <div class="container">
                            <div class="card">
                                <br><br>
                                        <br><br>
                                                <div class="card-header bg-dark">
                                                    <h1 class="text-white text-center"> Actualizar la Editorial </h1>
                                                </div><br>

                                                    <h3>Complete todos los campos</h3><br>

                                                    <label>Codigo:</label>
                                                    <input type="text" name="txtcod" value="<?php echo $cod_ed; ?>" class="form-control" readonly> <br>

                                                            <label> Nombre: </label>
                                                            <input type="text" name="txtnombre" value="<?php echo $nombre_ed; ?>" class="form-control" required> <br>

                                                                    <label> Dirección: </label>
                                                                    <input type="text" name="txtdireccion" value="<?php echo $direccion_ed; ?>" class="form-control"required > <br>

                                                                            <label> E-mail: </label>
                                                                            <input type="email" name="txtemail" value="<?php echo $correo_ed; ?>" class="form-control"required > <br>

                                                                                    <label> País: </label> <br>
                                                                                    
                                                                                        <select class="form-control" id="validationDefault15" required name="cbrol" >
                                                                                        <option selected disabled value="">Seleccione</option>
                                                                                        <?php
                                                                                            $sql2 = "select * from pais where estado='A'";
                                                                                            $sqlQuery2 = $pdo->prepare($sql2);
                                                                                            $sqlQuery2->execute();
                                                                                            $resultadopais2 = $sqlQuery2->fetchAll();
                                                                                            foreach ($resultadopais2 as $datos2):?>
                                                                                            <option value="<?php echo $datos2['id_pais']; ?>"><?php echo $datos2['pais']; ?></option>
                                                                                        <?php endforeach;?>
                                                                                        </select>   <br>  
                                                                                    
                                                                                    <label> Estado: </label> <br>
                                                                                        <select class="form-control"  name="cbestado" required>
                                                                                            <?php if ($estado_ed == 'A') { ?>
                                                                                                <option value="A">Activo</option>
                                                                                                <option value="I">Inactico</option>
                                                                                            <?php } else { ?>
                                                                                                <option value="I">Inactico</option>
                                                                                                <option value="A">Activo</option>
                                                                                            <?php } ?>

                                                                                        </select><br>
                                                                                        
                                                                                            
                                                                                            <br>     
                                                                                                <br>     
                                                                                                    <br>     
                                                                                                        <input type="button" value="Guardar Cambios" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered">
                                                                                                                    <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="exampleModalLabel">Modificaciones de editorial</h5>

                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            Ha realizado modificaciones. Desea guardar los cambios?
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                                                                            <input type="submit" value="Guardar" class="btn btn-primary" name="btnmodificar">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            </div>

                                                                                                            </div>
                                                                                                            </form>
                                                                                                        <?php } else { ?>

 <!--                  **********************   GUARDAR**************************-->

                                  <form action="Controlador_editorial/Editorial.php" method="POST">
                                                              <div class="container">
                                                              <div class="card">
                                                              <br><br>
                                                              <br><br>
                                                              <br><br>
                                                              <div class="card-header bg-dark">
                                                              <h1 class="text-white text-center">Crear nueva Editorial</h1>
                                                              </div><br>
                                                              <h3>Complete todos los campos</h3><br>
                                                              <label> Nombre: </label>
                                                              <input type="text" name="txtnombre" value="" class="form-control" required> <br>
                                                              <label> Dirección: </label>
                                                              <input type="text" name="txtdireccion" value="" class="form-control" required> <br>
                                                              <label> E-mail: </label>
                                                              <input type="email" name="txtemail" value="" class="form-control" required> <br>
                                                              <label >País</label>
                                                              <select class="form-control" id="validationDefault04" required name="cbrol" >
                                                                    <option selected disabled value="">Seleccione..</option>
                                                                        <?php
                                                                        $sql = "select * from pais where estado='A'";
                                                                        $sqlQuery = $pdo->prepare($sql);
                                                                        $sqlQuery->execute();
                                                                        $resultadopais = $sqlQuery->fetchAll();
                                                                        foreach ($resultadopais as $datos):?>
                                                                    <option value="<?php echo $datos['id_pais']; ?>"><?php echo $datos['pais']; ?></option>
                                                                    <?php endforeach;?>
                                                              </select>        
                                                              <br>
                                                              <!-- Modal -->
                                                              <input type="button" value="Guardar Cambios" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                                                              <div class = "modal fade" id = "exampleModal" tabindex = "-1" role = "dialog" aria-labelledby = "exampleModalLabel" aria-hidden = "true">
                                                              <div class = "modal-dialog modal-dialog-centered">
                                                              <div class = "modal-content">
                                                                <div class = "modal-header">
                                                                <h5 class = "modal-title" id = "exampleModalLabel">Crear nueva Editorial</h5>                                                                                               
                                                              </div>
                                                              <div class = "modal-body">
                                                                Desea continuar?
                                                              </div>
                                                              <div class = "modal-footer">
                                                                <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Cerrar</button>
                                                                <input type = "submit" value = "Registrar" class = "btn btn-primary" name = "btnguardar">
                                                              </div>
                                                              </div>
                                                              </div>
                                                              </div>
                                                               </form>
                                                          <?php
                                                         }
                                                                     ?>
</div>
</div>
<script src="../Template/js/jquery-1.12.0.min.js"></script>
<script src="../Template/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('#sidebarCollapse').on('click', function () {
$('#sidebar').toggleClass('active');
});
});
</script>

</body>
</html>