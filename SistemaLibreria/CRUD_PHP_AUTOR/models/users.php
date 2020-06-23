<?php
	include dirname(__file__,2)."../Datos/conexion.php";
	/**
	*
	*/
	class Users
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectar();
		}

		//Trae todos los usuarios registrados
		public function getUsers()
		{
			$query  ="SELECT * FROM autor";
			$result =@mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=@mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Crea un nuevo usuario
		public function newUser($data){
			$query  ="INSERT INTO autor (id_autor, nombre_autor, email,estado,id_pais) VALUES ('".$data['id_autor']."','".$data['nombre_autor']."','".$data['email']."','".$data['estado']."','".$data['id_pais']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function getUserById($id_autor=NULL){
			if(!empty($id_autor)){
				$query  ="SELECT * FROM users WHERE id_autor=".$id_autor;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function setEditUser($data){
			if(!empty($data['id_autor'])){
				$query  ="UPDATE autor SET nombre_autor='".$data['nombre_autor']."',email='".$data['email']."', estado='".$data['estado']."' WHERE id_autor=".$data['id_autor'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Borra el usuario por id
		public function deleteUser($id_autor=NULL){
			if(!empty($id_autor)){
				$query  ="DELETE FROM autor WHERE id_autor=".$id_autor;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Filtro de busqueda
		public function getUsersBySearch($data=NULL){
			if(!empty($data)){
				$query  ="SELECT * FROM autor WHERE nombre_autor LIKE'%".$data."%' OR last_name LIKE'%".$data."%' OR email LIKE'%".$data."%'";
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}
	}
