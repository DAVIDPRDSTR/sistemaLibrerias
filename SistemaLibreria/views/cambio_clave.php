<?php
/**
 * Created by PhpStorm.
 * User: FRANK
 * Date: 25/05/2020
 * Time: 15:33
 */

include_once "../controlador/GlobalFuntion.php";
include_once '../controlador/Consultas.php';
include_once '../Datos/conexion.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    \controlador\GlobalFunctions::redirectPage('../../Login.php', 'Error en envio de datos');
}
$email = $_SESSION['usuario'];
$baseUrl = \controlador\GlobalFunctions::baseUrl();

$user = \controlador\executeSelectOne("select * from usuario where email='$email'", $pdo);
$user = (object)$user;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cambio de Clave </title>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body class="login">
<div>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login_wrapper">
                    <div class="animate form login_form">
                        <section class="login_content">
                            <form method="post" action="../Controlador/CambioClave.php">
                                <h1>Cambio de Clave</h1>
                                Estimado <?= $user->nombres ?> a continuacion ingrese la nueva clave. <br><br>
                                <input type="hidden" value="<?= $user->id_usuario ?>" name="id" id="id">
                                <div>
                                    <input type="text" class="form-control" placeholder="Username" required=""
                                           name="username"
                                           value="<?= $user->email ?>"
                                           id="username" readonly="readonly"/>
                                </div>
                                <div>
                                    <input type="password" class="form-control" placeholder="Password" required=""
                                           name="password"
                                           id="password"/>
                                </div>
                                <div>
                                    <input type="password" class="form-control" placeholder="Confirmar Password"
                                           required=""
                                           name="confirmar_password"
                                           id="confirmar_password"/>
                                </div>
                                <div>
                                    <button class="btn btn-info form-control" name="btn_confirmar" id="btn_confirmar"
                                            type="submit">
                                        Confirmar
                                    </button>
                                    <button class="btn btn-danger form-control" name="btn_cancelar" id="btn_cancelar"
                                            type="submit">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>
<script>
    $(function () {
        var boton = $('#btn_confirmar');
        boton.attr("disabled", true);
    });
    $("#password").keyup(function () {
        var password = $('#password').val();
        var confirmar_password = $('#confirmar_password').val();
        validaPassword(password, confirmar_password);
    });
    $("#confirmar_password").keyup(function () {
        var password = $('#password').val();
        var confirmar_password = $('#confirmar_password').val();
        validaPassword(password, confirmar_password);
    });

    function validaPassword(password, confirmar_password) {
        var boton = $('#btn_confirmar');
        boton.attr("disabled", true);
        if (password == confirmar_password) {
            boton.attr("disabled", false);
        }
    }
</script>

<?php
if (isset($_GET['msj'])) {
    $msj = $_GET['msj'];
    ?>
    <script>
        alert(' <?=$msj?> ');
    </script>
    <?php
}
?>


</html>
