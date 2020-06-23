<?php include_once "Template/header.php"; ?>

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
                    <a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-outline-primary" title="Agregar Usuario"><i class="fa fa-user-plus"></i> Agregar
                    </a>
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
                                                <a href="#modalEdit_<?php echo $value['id_libro']; ?>" class="btn btn-outline-primary btn-sm" data-toggle="modal" title="Modificar">
                                                    <i class="fa fa-pen-square"></i>Editar</a>
                                                <a href="controlador/crudUsuarios.php?codid=<?php echo $value['id_libro']; ?>" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                                    <i class="fa fa-trash-alt"></i>Eliminar</a>
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



<?php include_once "Template/footer.php"; ?>