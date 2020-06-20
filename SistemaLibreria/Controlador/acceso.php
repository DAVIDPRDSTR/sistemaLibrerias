<?php

include '../Datos/conexion.php';

if (trim($_POST['usuario'])!='' && ($_POST['clave'])!='') {

    $mail=$_POST['usuario'];
    $contraseña=$_POST['clave'];

//$passmd5= md5($PASS);

    $sql="select * from usuario where email='$mail' and contraseña='$contraseña'";
    //a que voy a consultar
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->execute();
    @$resultado = $sqlQuery->fetchAll();
//Obtener que perfil tiene el usuario

    foreach ($resultado as $res) {

        $rol = $res['id_rol'];
        $contraseña = $res['contraseña'];
        $mail = $res['email'];
        $est=$res['estado'];

    }

    if (@$rol!= null && @$est== 'A' ) {


        switch ($rol) {

            case ("1"):echo "<script>location.href='../inicio.php';</script>";

                break;

            case ("2"):echo "";

                break;

        }

    }else{

        echo "Intentelo de nuevo";
    }

}

?>

