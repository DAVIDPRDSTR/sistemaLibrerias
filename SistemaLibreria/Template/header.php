<?php
session_start();
include '../Datos/conexion.php';
include '../Controlador/GlobalFuntion.php';

$usuario = $_SESSION['usuario'];
if ($usuario == "") {
    header("Location:Login.php");
}
$sql = "select * from usuario where email='$usuario'";
$query = $pdo->prepare($sql);
$query->execute();
$resultadoU = $query->fetchAll();

$baseUrl = \Controlador\GlobalFunctions::baseUrl();

foreach ($resultadoU as $resU) {
    $perfil = $resU['id_rol'];
    $nombreU = $resU['nombres'];
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>BOOKSHOP</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?php echo $baseUrl ?>Template/css/bootstrap.min.css" />
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo $baseUrl ?>Template/css/styles.css" />
        <link rel="stylesheet" href="<?php echo $baseUrl ?>Template/css/w3.css" />
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    </head>
    <body>
        <?php if ($perfil == 1) { ?>
            <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar">
                    <div class="sidebar-header" style="height:60px;">
                    </div>

                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="<?php echo $baseUrl ?>Template/menu.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="#CompanySubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="glyphicon glyphicon-briefcase"></i>
                                Mantenimientos
                            </a>
                            <ul  id="CompanySubmenu">
                                <li><a href="../CRUD_USUARIO/listarUsuarios.php">Usuarios</a></li>
                                <li><a href="../crud_autor">Autores</a></li>
                                <li><a href="../crud_libro/index.php">Libros</a></li>
                                <li><a href="../Crud_Editorial">Editorial</a></li>
                                <li><a href="../Vistas/Administrador.php">Descuentos</a></li>
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

                                            <img src="<?php echo $baseUrl ?>Template/images/books-4747627_640.png" alt="" width="30%" height="50%" />
                                            <!--                                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                                                                            <i class="glyphicon glyphicon-align-left"></i>
                                                                                        </button>-->
                                        </a>
                                    </h3>
                                </div>
                                <div style="float: right; width: 15%; padding-top: 0px;">

                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown top-menu-item-xs">
                                        <a href="#" class="nav-link dropdown-toggle navbar-light bg-light"  role="button" data-toggle="dropdown" aria-haspopup="true" style="background: #ffffff;">
                                            <img  src="<?php echo $baseUrl ?>Template/images/instagram-3814049_640.png" class="img-circle" width="30" style="border: 1px solid" />
                                        </a>
                                        <ul class="dropdown-menu" style="padding: 10px;">
                                            <li><a href="#" style="background: #ffffff;"><i class="glyphicon glyphicon-user"></i> <?php echo $nombreU; ?></a></li>
                                            <li class="divider"></li>
                                            <li id="changepassword"><a href="#" style="background: #ffffff;" onclick="changePassword();"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
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

                    <?php } else {
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
                                            Consultas
                                        </a>
                                        <ul class="collapse list-unstyled" id="CompanySubmenu">
                                            <li><a href="">Usuarios</a></li>
                                            <li><a href="#">Autores</a></li>
                                            <li><a href="#">Libros</a></li>
                                            <li><a href="#">Editorial</a></li>
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

                                                        <img src="<?php echo $baseUrl ?>Template/images/books-4747627_640.png" alt="" width="30%" height="50%" />
                                                        <!--                                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                                                                                        <i class="glyphicon glyphicon-align-left"></i>
                                                                                                    </button>-->
                                                    </a>
                                                </h3>
                                            </div>
                                            <div style="float: right; width: 15%; padding-top: 0px;">

                                            </div>
                                        </div>
                                        <div class="collapse navbar-collapse bg-light" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right bg-light">
                                                <li class="dropdown top-menu-item-xs bg-light">
                                                    <a href="#" class="nav-link dropdown-toggle navbar-light bg-light"  role="button" data-toggle="dropdown" aria-haspopup="true" style="background: #ffffff;">
                                                        <img  src="<?php echo $baseUrl ?>Template/images/instagram-3814049_640.png" class="img-circle" width="30" style="border: 1px solid" />
                                                    </a>



                                                    <ul class="dropdown-menu" style="padding: 10px;">
                                                        <li><a href="#" style="background: #ffffff;"><i class="glyphicon glyphicon-user"></i> <?php echo $nombreU; ?></a></li>
                                                        <li class="divider"></li>
                                                        <li id="changepassword"><a href="#" style="background: #ffffff;" onclick="changePassword();"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
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




                                    <?php }?>