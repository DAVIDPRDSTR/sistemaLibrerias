<?php include_once "templates/header.php"; ?>
<?php include_once "templates/nav.php"; ?>
<?php
$sql = "SELECT l.id_libro,e.nombre,l.titulo,l.descripcion,l.num_paginas,l.edicion,l.portada,l.año,l.estado FROM libro l INNER JOIN editorial e ON l.id_editorial =e.id_editorial ";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Libros</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <br>
                    <div class="panel-heading">
                        <a class="btn btn-primary" title="Nuevo" data-toggle="modal" data-target="#modalAddTec">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </div>
                    <div class="panel-heading">
                        Registro de los libros
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Editorial</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Numeros paginas</th>
                                        <th>Edicion</th>
                                        <th>Portada</th>
                                        <th>Año</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result as $key => $value) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $value['id_libro']; ?></td>
                                            <td><?php echo $value['nombre']; ?></td>
                                            <td><?php echo $value['titulo']; ?></td>
                                            <td><?php echo $value['descripcion']; ?></td>
                                            <td><?php echo $value['num_paginas']; ?></td>
                                            <td><?php echo $value['edicion']; ?></td>
                                            <td><?php echo $value['portada']; ?></td>
                                            <td><?php echo $value['año']; ?></td>
                                            <td><?php echo $value['estado']; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" title="Editar" data-toggle="modal" data-target="#modalEditTec" onclick="obtenerDatosTecnicos('<?php echo $datos ?>')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal" data-target="#modalDeleteTec" onclick="obtenerIDEliminar('<?php echo $datos ?>')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>



<?php include_once "templates/footer.php"; ?>