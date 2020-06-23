<?php include_once "../Datos/conexion.php";


if (isset($_POST['btnGuardar']) != null) {
    $imagen = ($_FILES['file']['tmp_name']);
    $portada = fopen($imagen, 'rb');
    $datos = array(
        'titulo' => $_POST['titulo'],
        'edicion' => $_POST['edicion'],
        'nump' => $_POST['nump'],
        'an' => $_POST['an'],
        'descripcion' => $_POST['descripcion'],
        'portada' => $portada,
        'estado' => $_POST['estado'],
        'ideditorial' => $_POST['editorial'],
    );
    $sql = "INSERT INTO libro (titulo,descripcion,num_paginas,edicion,portada,año,estado,id_editorial)
    VALUE(:titulo,:descripcion,:nump,:edicion,:portada,:an,:estado,:ideditorial)";
    $query = $pdo->prepare($sql);
    $query->bindParam(':portada', $i, PDO::PARAM_LOB);
    $query->bindParam(':idusu', $cod1, PDO::PARAM_INT);
    $query->execute();
}
