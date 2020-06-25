<?php
// 1ra conexion
try {
    $pdo=new PDO("mysql:dbname=libreria;host=35.192.84.36","6ANOCTURNO","6aNOCT@**");
    
} catch (Exception $ex) {
    die('Error'.$ex->getMessage());
}

// 2nda conexion
	class Conexion{
		private $host;
		private $user;
		private $password;
		private $dataBase;

		public function __construct(){
			$this->host     ="35.192.84.36"; //
			$this->user     ="6ANOCTURNO"; //Usuario Base de datos
			$this->password ="6aNOCT@**"; //Contraseña de usuario de base de datos
			$this->dataBase ="libreria"; //Nombre de la base de datos
		}

		public function conectarse(){
			$enlace = mysqli_connect($this->host, $this->user, $this->password, $this->dataBase);
			if($enlace){
				// echo "Conexion exitosa";	//si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
			}else{
				die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
			}
			return($enlace);
			// mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
		}
	}
	

	?>