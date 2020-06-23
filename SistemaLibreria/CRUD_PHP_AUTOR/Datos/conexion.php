
<?php
class Conexion{
    public static function Conectar(){
        define('servidor','35.192.84.36');
        define('nombre_bd','libreria');
        define('usuario','6ANOCTURNO');
        define('password','6aNOCT@**');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es :".$e->getMessage());
        }
    }

}
?>
