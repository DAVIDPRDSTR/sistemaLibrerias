<?php
session_start();
include '../Datos/conexion.php';
$usuario = $_SESSION['usuario'];
if ($usuario=="") {
    header("Location:index.php");
}
$sql = "select * from usuario where email='$usuario'";
$query = $pdo->prepare($sql);
$query->execute();
$resultadoU = $query->fetchAll();



foreach ($resultadoU as $resU) {
    $perfil = $resU['id_rol'];
    $nombreU = $resU['nombres'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/w3.css" />
    </head>
    <body>
        <?php if ($perfil == 1) {
            ?>
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
                                <li><a href="../CRUD_USUARIO/listarUsuarios.php"><i class="glyphicon glyphicon-user"></i>Usuarios</a></li>
                                <li><a href="../CRUD_PHP_AUTOR/index.php">Autores</a></li>
                                <li><a href="../crud_libro/index.php">Libros</a></li>
                                <li><a href="../Crud_Editorial">Editorial</a></li>
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
                                            <img src="images/eangkor.png" alt="E ANGKOR YOUTUBE CHANNEL" width="40" style="padding: 0 5px 0 5px;" />EANGKOR
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
                                            <img id="userimg" src="images/default.png" alt="user-img" class="img-circle" width="30" style="border: 1px solid" />
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
                    <div style="margin: 100px 10px 10px 20px;">

                    </div>
                </div>
            </div>
            <script src="js/jquery-1.12.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
        <?php } else { ?>
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
                                Acciones
                            </a>
                            <ul class="collapse list-unstyled" id="CompanySubmenu">
                                <li><a href="#">Usuarios</a></li>
                                <li><a href="#">Autores</a></li>
                                <li><a href="#">Libros</a></li>
                                <li><a href="#">Editorial</a></li>
                            </ul>
                        </li>
                                                <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="glyphicon glyphicon-duplicate"></i>
                                Acerca de
                            </a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li><a href="#">Nosotros</a></li>
                                <li><a href="#">Ubicacion</a></li>
                            </ul>
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
                                            <img src="images/eangkor.png" alt="E ANGKOR YOUTUBE CHANNEL" width="40" style="padding: 0 5px 0 5px;" />EANGKOR
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
                                            <img id="userimg" src="images/default.png" alt="user-img" class="img-circle" width="30" style="border: 1px solid" />
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
                    <div style="margin: 100px 10px 10px 20px;">

                    </div>
                </div>
            </div>

            <!-- jQuery CDN -->
            <script src="js/jquery-1.12.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
        <?php }
        ?>
    </body>
</html>