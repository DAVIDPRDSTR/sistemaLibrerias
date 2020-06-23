<?php 
session_start();
include 'conexion.php';
?>

<?php 
if($_GET){
        $cod=$_GET['cod']; // metodo 1 unico valor
        $datos =['id'=>$_GET['cod']]; // metodo 2 arreglo detos
        $sql= "update usuarios set estado='I' where id_usuario=$cod";// usando metodo 1  
        $sql2= "update usuarios set estado='I' where id_usuario=:id"; // usando metodo 2  

        $query = $pdo->prepare($sql);
        $query -> execute();
        
        // echo "<script> alert ('Registro Eliminado');location.href='../usuarios.php'</script>";
        header("Location:../listarUsuarios.php");
        $_SESSION['msjEliminar']='OK';
}   

if(isset($_POST['btnGuardar'])!=null) {
        $datos =['nombres'=> $_POST['txtNombre'],
                'dni'=>$_POST['txtDni'],
                'direccion'=>$_POST['txtDireccion'],
                'fecha_nacimiento'=>date("Y/m/d",strtotime($_POST['txtFecha'])),
                'telefono'=>$_POST['txtTelefono'],
                'email'=> $_POST['txtUsuario'],
                'contraseña'=>$_POST['txtClave'],
                'id_rol'=>$_POST['cmbRol']];
        $sql= "insert into usuario (nombres, dni, direccion, fecha_nacimiento, telefono, email, contraseña, id_rol) values(:nombres,:dni,:direccion,:fecha_nacimiento,:telefono,:email,:contraseña,:id_rol);";
        $sqlquery = $pdo->prepare($sql);
        $sqlquery ->execute($datos);
        header("Location:../listarUsuarios.php");
}

if (true) {
        $datos =[
                'id'=>$_POST['txtCodigo'],
                'nombre'=>$_POST['txtNombre'],
                'usuario'=>$_POST['txtUsuario'],
                'password'=>$_POST['txtClave']
                ]; // metodo 2 arreglo datos
         
        $sql2= "update usuarios set nombre=:nombre, usuario=:usuario, password=:password where codU=:id"; // usando metodo 2  
        $query = $pdo->prepare($sql2);
        $query -> execute($datos);
        
        // echo "<script> alert ('Registro Eliminado');location.href='../usuarios.php'</script>";
        header("Location:../listarUsuarios.php");
        $_SESSION['msjModificar']='OK';
}

?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

