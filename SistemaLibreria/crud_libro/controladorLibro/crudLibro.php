<?php include_once "../../Datos/conexion.php";


if (isset($_POST['btnGuardar']) != null) {
    $imagen = ($_FILES['file']['tmp_name']);
    $avatar = fopen($imagen, 'rb');

    $titulo = $_POST['titulo'];
    $edicion = $_POST['edicion'];
    $nump = $_POST['nump'];
    $an = $_POST['an'];
    $descripcion = $_POST['descripcion'];
    $portada = $avatar;
    $estado = $_POST['estado'];
    $ideditorial = $_POST['editorial'];

    $sql = "INSERT INTO libro (titulo,descripcion,num_paginas,edicion,portada,ann,estado,id_editorial) VALUES(:titulo,:descripcion,:nump,:edicion,:portada,:ann,:estado,:ideditorial)";
    $query = $pdo->prepare($sql);
    //BINDPARAM Vincula un parámetro al nombre de variable especificado
    $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);  
    $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $query->bindParam(':nump', $nump, PDO::PARAM_INT);
    $query->bindParam(':edicion', $edicion, PDO::PARAM_STR);
    $query->bindParam(':portada', $portada, PDO::PARAM_LOB);
    $query->bindParam(':ann', $an, PDO::PARAM_INT);
    $query->bindParam(':estado', $estado, PDO::PARAM_STR_CHAR);
    $query->bindParam(':ideditorial', $ideditorial, PDO::PARAM_INT);
    $query->execute();
    header("location: ../index.php");
}
