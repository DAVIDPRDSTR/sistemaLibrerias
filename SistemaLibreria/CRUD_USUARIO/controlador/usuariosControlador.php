<?php 
session_start();
// include 'conexion.php';
include '../../Datos/conexion.php';
?>

<?php 
if($_GET){
        $cod=$_GET['cod']; // metodo 1 unico valor
        $datos =['id'=>$_GET['cod']]; // metodo 2 arreglo detos
        $sql= "update usuario set estado='I' where id_usuario=$cod";// usando metodo 1  
        $sql2= "update usuarios set estado='I' where id_usuario=:id"; // usando metodo 2  

        $query = $pdo->prepare($sql);
        $query -> execute();
        
        // echo "<script> alert ('Registro Eliminado');location.href='../usuarios.php'</script>";
        header("Location:../listarUsuarios.php");
        $_SESSION['msjEliminar']='OK';
}   

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

if (true) {
        $datos =[
                'id'=>$_POST['txtCodigo'],
                'nom'=> $_POST['txtNombre'],
                'dni'=>$_POST['txtDni'],
                'dir'=>$_POST['txtDireccion'],
                'fnac'=>date("Y/m/d",strtotime($_POST['txtFecha'])),
                'tel'=>$_POST['txtTelefono'],
                'ema'=> $_POST['txtUsuario'],
                'pass'=>$_POST['txtClave'],
                'rol'=>$_POST['cmbRol']
                ]; // metodo 2 arreglo datos
         
        $sql2= "update usuario set nombres=:nom, dni=:dni, direccion=:dir,fecha_nacimiento=:fnac,telefono=:tel, email=:ema, contraseña=:pass, id_rol=:rol where id_usuario=:id"; // usando metodo 2  
        $query = $pdo->prepare($sql2);
        $query -> execute($datos);
        
        // echo "<script> alert ('Registro Eliminado');location.href='../usuarios.php'</script>";
        header("Location:../listarUsuarios.php");
        $_SESSION['msjModificar']='OK';
}

?>
