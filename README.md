# Repositorio 6A NOCTURNO

> ITSCO

> ANALISIS DE SISTEMAS

> 6 NIVEL

![imagen Instituto](https://www.itscovirtual.cordillera.edu.ec/pluginfile.php/1/theme_mb2iq/logo/1585168187/logoitsco.png)

**Proyecto de SISTEMA DE LIBRERIA**

- Realizado en MYSQL-PHP-HTML-CSS-JS
- Modo WEB

![imagen Lenguajes](https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRSRm-cIeMWdV-RGOctwzMTRHMX77mZSZqHZA&usqp=CAU)

## CODIGO (Principales)

> codigo 1
```PHP
// code away!
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
}   
 
```

---

> codigo 2

```PHP
// code away!

if(isset($_POST['btnGuardar'])!=null) {
        $datos =['nom'=> $_POST['txtNombre'],
            'dni'=>$_POST['txtDni'],
            'dir'=>$_POST['txtDireccion'],
            'fnac'=>date("Y/m/d",strtotime($_POST['txtFecha'])),
            'tel'=>$_POST['txtTelefono'],
            'ema'=> $_POST['txtUsuario'],
            'pass'=>$_POST['txtClave'],
            'rol'=>$_POST['cmbRol']];
        $sql= "insert into usuario (nombres, dni, direccion, fecha_nacimiento, telefono, email, contraseña, id_rol) values(:nom,:dni,:dir,:fnac,:tel,:ema,:pass,:rol);";
        $sqlquery = $pdo->prepare($sql);
        $sqlquery ->execute($datos);
        header("Location:../listarUsuarios.php");
}
```
---

> codigo 3

```PHP
// code away!

if (isset($_POST['btnmodificar']) != null) {
    $codid=$_POST['txtcod'];
    $datos = ['nombre' => $_POST['txtnombres'], 'usuario' => $_POST['txtcorreo'], 'contraseña' => $_POST['txtpassword'], 'rol' => $_POST['cbrol']];
    $sql = "update usuarios set nombres=:nombres,usuario=:usuario,contraseña=:contraseña,rol=:rol where codigo=$codid";
    $sqlQuery = $pdo->prepare($sql);
    $sqlQuery->execute($datos);
    //$_SESSION['UsuarioRegistrado'] = 'OK';
    //header("Location:../Usuarios.php");
}
```
---

> codigo 4

```PHP
// code away!

if (isset($_POST['done'])) {

    $id = $_GET['id_editorial'];
    $nombre = $_POST['nombre1'];
    $direccion = $_POST['direccion1'];
    $email = $_POST['email1'];
    $estado = $_POST['estado1'];
    $q = " update editorial set id_editorial=$id, nombre='$nombre', direccion='$direccion', email='$email', estado='$estado' where id_editorial=$id  ";

    $query = mysqli_query($con, $q);

    header('location:index.php');
}
```
---
## COPYRIGHT (©) by:

- **[ITSCO](https://www.cordillera.edu.ec/)**
- Copyright 2020 © <a href="https://www.cordillera.edu.ec/carreras/analisis-de-sistemas/" target="_blank">Analisis de sistemas</a>

