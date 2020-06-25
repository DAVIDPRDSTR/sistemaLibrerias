<?php

include '../Datos/conexion.php';
session_start();

$user = $_POST['usuario'];
$pass = $_POST['clave'];

$sql = "select * from usuario where email='$user' and contraseña='$pass'";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();
if (validarUsuario($user, $pdo) == true) {
    foreach ($result as $res) {
        $rol = $res['id_rol'];
    }
    $_SESSION['usuario'] = $user;
    if (@$rol) {
        switch ($rol) {
            case ("1"):
                echo "<script>alert('Bienvenido Administrador');location.href='../Template/principal.php'</script>";

                break;
            case ("2"): echo "<script>alert('Bienvenido invitado');location.href='../Template/principal.php'</script>";

                break;
        }
    } else {
        if ((isset($_SESSION['n'])) && (isset($_SESSION['usuario']))) {
            $dato = $_SESSION['usuario'];
            if ($dato === $user) {
                $_SESSION['n'] = $_SESSION['n'] + 1;
                $int = $_SESSION['n'];
                if ($int >= 3) {
                    //modificamos el estado del usuario
                    $sql1 = "update usuario set estado='I' where email='$user'";
                    $querysql1 = $pdo->prepare($sql1);
                    $querysql1->execute();
                    $mensaje2 = 'Lo sentimos, su usuario ha sido bloqueado';
                    echo "<script type='text/javascript'>alert('$mensaje2');</script>";
                    header('refresh:0.2;url=../Login.php');
                    limpiarSession();
                } else {
                    echo "<script type='text/javascript'>alert('$int intetnto, Usuario/Password Incorrecto');window.location= '../Login.php'</script>";
                }
            } else {
                $_SESSION['n'] = 1;
                $_SESSION['usuario'] = $user;
                echo "<script type='text/javascript'>alert('Usuario/Password Incorrecto');window.location= '../Login.php'</script>";
            }
        } else {
            $_SESSION['n'] = 1;
            $_SESSION['usuario'] = $user;
            echo "<script type='text/javascript'>alert('Usuario/Password Incorrecto');window.location= '../Login.php'</script>";
        }
    }
} elseif (validarEstado($user, $pdo) == true) {
    echo "<script type='text/javascript'>alert('El estado del usuario esta inactivo');window.location= '../Login.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Usuario/Password no existen');window.location= '../Login.php'</script>";
}

function validarUsuario($usu, $pdo2) {
    $sqlus = "select * from usuario where email='$usu' and estado='A'";
    $querysqluser = $pdo2->prepare($sqlus);
    $querysqluser->execute();
    $numeroDeFilas = $querysqluser->rowCount();
    # Si son 0 o menos, significa que no existe
    if ($numeroDeFilas <= 0) {
        return false;
    } else {
        return true;
    }
}

function validarEstado($usu, $pdo2) {
    $sqlus = "select * from usuario where email='$usu' and estado='I'";
    $querysqluser = $pdo2->prepare($sqlus);
    $querysqluser->execute();
    $numeroDeFilas = $querysqluser->rowCount();
    # Si son 0 o menos, significa que no existe
    if ($numeroDeFilas <= 0) {
        return false;
    } else {
        return true;
    }
}

function limpiarSession() {
    unset($_SESSION['n']);
    unset($_SESSION['usuario']);
}

?>