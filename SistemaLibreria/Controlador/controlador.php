<?php

session_start();
include '../Datos/conexion.php';
//*************************************METODO ELIMINAR********************************************
if ($_GET) {
    $cod = $_GET['codigo'];
//    $datos = ['id'=>$_GET['cod']];
//    $sql="update usuarios set estado ='I' where cod=:id";
    $sql = "update usuarios set estado ='E' where codigo=$cod";
    $sqlQuery = $pdo45->prepare($sql);
    $sqlQuery->execute();
//  echo "<script>bootbox.confirm('Usuario Eliminado',funcion);</script>";
    // echo "<script>alert('Usuario Eliminado');location.href='../usuario.php'</script>";
    header("Location:../Usuarios.php");
    $_SESSION['MensajeEliminado'] = 'OK';
}
//*************************************METODO INSERTAR********************************************
if (isset($_POST['btnguardar']) != null) {
    $datos = ['nombre' => $_POST['txtnombres'], 'usuario' => $_POST['txtcorreo'], 'password' => $_POST['txtpassword'], 'rol' => $_POST['cbrol']];
    $sql = "insert into usuarios (nombre,usuario,password,rol,estado) values(:nombre,:usuario,:password,:rol,'A')";
    $sqlQuery = $pdo45->prepare($sql);
    $sqlQuery->execute($datos);
    //$_SESSION['UsuarioRegistrado'] = 'OK';
    header("Location:../Usuarios.php");
    
}
//*************************************METODO MODIFICAR********************************************
if (isset($_POST['btnmodificar']) != null) {
    $codid=$_POST['txtcod'];
    $datos = ['nombre' => $_POST['txtnombres'], 'usuario' => $_POST['txtcorreo'], 'password' => $_POST['txtpassword'], 'rol' => $_POST['cbrol']];
    $sql = "update usuarios set nombre=:nombre,usuario=:usuario,password=:password,rol=:rol where codigo=$codid";
    $sqlQuery = $pdo45->prepare($sql);
    $sqlQuery->execute($datos);
    //$_SESSION['UsuarioRegistrado'] = 'OK';
    header("Location:../Usuarios.php");
}
?>

