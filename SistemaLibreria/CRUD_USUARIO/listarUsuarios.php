<?php 
//include 'toolbar.php';;  
include '../Datos/conexion.php';
include 'views/encabezado.php';
?>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
        <h1>LISTAR USUARIOS</h1>
        </div>

    </div>
</div>

<?php 
        $sql="select * from usuario u Inner join rol r on u.id_rol = r.id_rol where u.estado='A'"; 
        $querySql=$pdo->prepare($sql);
        $querySql->execute();
        $resultadoU=$querySql->fetchAll();
?>

<div class="container">
    <div class="row">
    <a href="frmUsuario.php" class="btn btn-primary" type="submit">Agregar</a>
    <!-- <input class="btn btn-primary" type="submit" value="Agregar"> -->
        <div class="col-lg-12 text-center">
        
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="font-weight-bold">
                    <td>CODIGO</td>
                    <td>NOMBRE</td>
                    <td>USUARIO</td>
                    <td>ROL</td>
                    <td>ESTADO</td>
                    <td colspan="2">ACCIONES</td>   
                   
                </tr>
            </thead>
                    <?php 
                    foreach ($resultadoU as $resU) {   ?>
                    <tbody>
                    <tr>
                    
                        <!-- <td><img src="verImagen.php?id=<?php echo $resU ['codU'];?>" width="50"/></td> -->
                        <td class="font-weight-bold"><?php echo $resU ['id_usuario'];?></td>
                        <td><?php echo $resU ['nombres']; ?></td>
                        <td><?php echo $resU ['email']; ?></td>
                        <td><?php echo $resU ['descripcion']; ?></td>
                        <td><?php
                                    if($resU['estado']=='A'){
                                        echo "<span class='badge badge-primary'>Activo</span>"; 
                                    }else{
                                        echo "<span class='badge badge-primary'>Pendiente</span>"; 
                                    }
                        ?></td>
                        <td><a href="frmUsuario.php?cod=<?php echo $resU ['id_usuario']; ?>"> <i class="fas fa-edit" title="Modificar"></i></a></td>
                        <td><a href="controlador/usuariosController.php?cod=<?php echo $resU ['id_usuario']; ?>"><i class="fas fa-trash-alt" title="Eliminar"></i></a></td>
                    </tr>
                    </tbody>
                    <?php }
                    ?>
            </table>
        </div>

    </div>
<?php 
    if(@$_SESSION['msjEliminar']=='OK') { ?> 
        <div class="alert alert-success" role="alert">
            Registro Eliminado exitosamente
        </div>
    <?php 
            $_SESSION['msjEliminar']='';
        }else{
            $_SESSION['msjEliminar']='';
        }    
    ?>

<?php 
    if(@$_SESSION['msjModificar']=='OK') { ?> 
        <div class="alert alert-primary" role="alert">
            Registro modificado exitosamente
        </div>
    <?php 
            $_SESSION['msjModificar']='';
        }else{
            $_SESSION['msjModificar']='';
        }    
    ?>
</div>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
