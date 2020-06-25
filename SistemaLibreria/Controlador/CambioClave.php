<?php
/**
 * Created by PhpStorm.
 * User: FRANK
 * Date: 25/05/2020
 * Time: 15:33
 */

include '../Datos/conexion.php';
include 'Consultas.php';
include 'GlobalFuntion.php';


if (isset($_POST['password']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];

    $userExiste = \controlador\executeSelectOne("select *from usuario where id_usuario='$id' and estado='A'",$pdo);

    if ($userExiste) {
        \controlador\executeCommand("update usuario set contraseña='$password' where id_usuario='$id'",$pdo);
        session_start();
        session_destroy();
        \controlador\GlobalFunctions::redirectPage('../Login.php','Ingrese con su nueva clave');
    } else {
        \controlador\GlobalFunctions::redirectPage('../views/cambio_clave.php', 'El usuario no existe o se encuentra desabilitado');
    }
} else {
    \controlador\GlobalFunctions::redirectPage('../Login.php', 'Error en envio de datos');
}


?>

