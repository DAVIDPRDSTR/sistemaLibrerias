<?php

include '../Datos/conexion.php';
//funcion trim para validar datos vacios o nulo


if (trim($_POST['USER'])!='' && ($_POST['PASS'])!='') {
    $mail=$_POST['USER'];
    $contraseña=$_POST['PASS'];
    //$passmd5= md5($PASS);
    
    $sql="select * from usuarios where usuario='$mail' and  password='$contraseña' and estado='A'";//a que voy a consultar 
    
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->execute();
    @$resultado = $sqlQuery->fetchAll();
    
    //Obtener que perfil tiene el usuario
    foreach ($resultado as $res) {
        $rol = $res['rol'];
        $contraseña = $res['contraseña'];
        $mail = $res['mail'];
        $est=$res['estado'];
    }
    
    if (@$rol!= null && @$est== 'A' ) {
        switch ($rol) {
            case ("1"):echo  "<script>location.href='../inicio.php';</script>";
                break;

            case ("2"):echo  "<h1>Invitado</h1>";
                break;
            
        }
        
    }else{
        echo "Intentelo de nuevo";
    
    
    }   

           
    }       
           
   

    ?>
