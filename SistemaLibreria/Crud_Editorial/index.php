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
            <!--                    LISTA DE EDITORIALES-->
            <?php
            $sql_lista_editorial = "select * from editorial where estado= 'A' or estado= 'I' ";
            $sqlQuery = $pdo->prepare($sql_lista_editorial);
            $sqlQuery->execute();
            $resultado_lista_editorial = $sqlQuery->fetchAll();
            ?>
            <div class="container">
                <div class="container-fluid">

                    <br>
                    <br>
                    <div class="col-lg-12">
                        <br><br>
                        <h1 class="text-warning text-center"> Editorial </h1><br>
                        <a href="nueva_editorial.php" class="btn btn-primary">Agregar</a>

                        <!--                                                        BUSQUEDA-->
                        <input style="width: fit-content;float: right; margin-right: 40px;" class="form-control" id="myInput" type="text" placeholder="Buscar..">

                        <br>
                        <br>
                        <table id="tabledata" class=" table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="bg-dark text-white text-center">

                                    <th> Codigo </th>
                                    <th> Nombre </th>
                                    <th> Dirección </th>
                                    <th> E-mail </th>
                                    <th> Pais </th>
                                    <th> Estado </th>
                                    <th colspan="2" style="text-align: center;"> Acciones </th>

                                </tr>
                            </thead>
                            <?php foreach ($resultado_lista_editorial as $res_ed) { ?>
                                <tbody id="myTable">
                                    <tr>
                                        <td><?php echo $res_ed['id_editorial']; ?></td>
                                        <td><?php echo $res_ed['nombre']; ?></td>
                                        <td><?php echo $res_ed['direccion']; ?></td>
                                        <td><?php echo $res_ed['email']; ?></td>
                                        <td><?php
                                            $sql2 = "select * from pais where estado='A'";
                                            $sqlQuery2 = $pdo->prepare($sql2);
                                            $sqlQuery2->execute();
                                            $resultadopais2 = $sqlQuery2->fetchAll();
                                            foreach ($resultadopais2 as $datos2) :

                                                if ($datos2['id_pais'] == $res_ed['id_pais']) {
                                                    echo $datos2['pais'];
                                                }
                                            endforeach;
                                            ?>

                                        </td>
                                        <td><?php if ($res_ed['estado'] == 'A') { ?>
                                                <span class="badge badge-pill badge-primary">Activo</span>
                                                <?php
                                            } else {
                                                if ($res_ed['estado'] == 'I') {
                                                ?>
                                                    <span class="badge badge-pill badge-warning">Inactivo</span>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary"><a href="nueva_editorial.php?id_editorial=<?php echo $res_ed['id_editorial']; ?>"><i class="fas fa-edit" title="Modificar"></i>Modificar</a></button>

                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="Controlador_editorial/Editorial.php?id_editorial=<?php echo $res_ed['id_editorial']; ?>">Eliminar</a>

                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="../Template/js/jquery-1.12.0.min.js"></script>
    <script src="../Template/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>