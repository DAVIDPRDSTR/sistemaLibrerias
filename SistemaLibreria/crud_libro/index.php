<?php include '../Template/header.php';  ?>
<?php include_once "templates/header.php"; ?>
<?php include_once "templates/nav.php"; ?>
<?php
$sql = "SELECT l.id_libro,e.nombre,l.titulo,l.descripcion,l.num_paginas,l.edicion,l.portada,l.ann,l.estado FROM libro l INNER JOIN editorial e ON l.id_editorial =e.id_editorial WHERE l.estado='A' ";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();
?>
<div class="container">
    <div class="row">
        <br><br>
        <div class="col-lg-6">
            <h1 class="page-header">Libros</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-heading">
        <a class="btn btn-primary" title="Registro" data-toggle="modal" data-target="#modalAddLibro">
            <i class="fa fa-plus"></i> Registro
        </a>
        <?php include_once "addLibro.php"; ?>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
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
                                        <td> <img src="data:image/jpeg;base64, <?php echo base64_encode($value['portada']); ?>" width="50" height="50" /></td>
                                        <td><?php echo $value['ann']; ?></td>
                                        <td>
                                            <?php
                                            if ($value['estado'] == 'A') {
                                                echo "<span class='badge badge-dark'>Activo</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <!--href nos permite enviar el id hacia el modal -->
                                            <a href="#modalmodificar_<?php echo $value['id_libro']; ?>" class="btn btn-primary btn-sm" title="Editar" data-toggle="modal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#modalEliminar_<?php echo $value['id_libro']; ?>" class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <?php
                                            include("eliminar.php");
                                            ?>
                                        </td>
                                        <?php
                                        include("modificar.php");
                                        ?>
                                    </tr>
                                    <?php }
                                ?>
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

<?php include_once "templates/footer.php"; ?>
<?php include '../Template/footer.php';  ?>