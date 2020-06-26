<?php include_once "../../Datos/conexion.php";

if (isset($_POST['btnGuardar']) != null) {
    $imagen = ($_FILES['file']['tmp_name']);
    $avatar = fopen($imagen, 'rb');
//Se llama a las variables
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
if(isset($_POST['btnEliminar']) != null) {
    $codigo = $_POST['idlibro'];
    $sql = "UPDATE libro set estado='I' where id_libro='$codigo'";
    $query = $pdo->prepare($sql);
    $query -> execute();
    if($query){
        header("location: ../index.php");
    }
}

if (isset($_POST['btnModificar']) != null) {

    $codigo = $_POST['idlibro'];  
    
    $titulo = $_POST['titulo'];
    $edicion = $_POST['edicion'];
    $nump = $_POST['nump'];
    $an = $_POST['an'];
    $descripcion = $_POST['descripcion'];
    $ideditorial = $_POST['editorial'];
    
    $sqlu = "UPDATE libro set titulo = :titulo, descripcion = :descripcion, num_paginas = :nump, edicion = :edicion, ann = :ann, id_editorial = :ideditorial where id_libro = $codigo;";
    $queryu = $pdo->prepare($sqlu);
    
    $queryu->bindParam(':titulo', $titulo, PDO::PARAM_STR);  
    $queryu->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $queryu->bindParam(':nump', $nump, PDO::PARAM_INT);
    $queryu->bindParam(':edicion', $edicion, PDO::PARAM_STR);
    $queryu->bindParam(':ann', $an, PDO::PARAM_INT);
    $queryu->bindParam(':ideditorial', $ideditorial, PDO::PARAM_INT);
    
    $queryu->execute();
    header("location: ../index.php");
}

if(isset ($_POST['btnDescuento']) != null){
    $descuento = $_POST['descuentoLibro'];
    $sql = "UPDATE stocklibro SET descuento = $descuento";
    $query = $pdo->prepare($sql);
    $query->execute();
    header("location: ../../Vistas/Administrador.php");
}
