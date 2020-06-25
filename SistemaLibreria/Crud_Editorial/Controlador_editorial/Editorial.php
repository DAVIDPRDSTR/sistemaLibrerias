<?php
@session_start();

include '../../Datos/conexion.php';
//*************************************METODO ELIMINAR********************************************
if ($_GET) {
    $id_editorial = $_GET['id_editorial'];
//    $datos = ['id'=>$_GET['cod']];
//    $sql="update usuarios set estado ='I' where cod=:id";
    $sql = "update editorial set estado = 'E' where id_editorial = $id_editorial";
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->execute(); 
//    echo "<script>bootbox.confirm('Usuario Eliminado',funcion);</script>";
    echo "<script>alert('Esta seguro de Eliminar la editorial? ');location.href='../index.php'</script>";
 //   header("Location:../index.php");

}

//*************************************METODO INSERTAR********************************************
if (isset($_POST['btnguardar']) != null) {
    $datos = ['nombre' => $_POST['txtnombre'],'direccion' => $_POST['txtdireccion'], 'email' => $_POST['txtemail']];
    $sql = "insert into editorial (nombre,direccion,email,estado) values(:nombre,:direccion,:email,'A')";
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->execute($datos);
    //$_SESSION['UsuarioRegistrado'] = 'OK';
    header("Location:../index.php");
}

//*************************************METODO MODIFICAR********************************************
if (isset($_POST['btnmodificar']) != null) {
    $codid=$_POST['txtcod'];
    $datos = ['nombre' => $_POST['txtnombre'], 'direccion' => $_POST['txtdireccion'], 'email' => $_POST['txtemail'], 'estado' => $_POST['cbestado']];
    $sql = "update editorial set nombre=:nombre,direccion=:direccion,email=:email,estado=:estado where id_editorial=$codid";
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->execute($datos);
    //$_SESSION['UsuarioRegistrado'] = 'OK';
    header("Location:../index.php");
}