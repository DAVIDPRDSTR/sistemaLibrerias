<?php

  include './models/users.php';
  $title="Listado de Usuarios";

  $user     = new Users();
  $id_autor       = isset($_GET['id_autor'])?$_GET['id_autor']:null;
  $users    = $user->getUserById($id_autor);
  $nombre_autor = '';
  $estado = '';
  $email    = '';
  if($users){
    $nombre_autor =$users[0]['nombre_autor'];
    $estado =$users[0]['estado'];
    $email    =$users[0]['email'];
  }

	include 'toolbar.php';
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="nombre_autor">Nombres</label>
    <input type="text" class="form-control" id="nombre_autor" name="nombre_autor" placeholder="Tus nombres" autofocus required value="<?php echo $nombre_autor; ?>">
  </div>
  <div class="form-group">
  	 <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Tu e-mail" required value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
  	 <label for="id_pais">Pais</label>
     <div >
           <select name="id_pais" id="estado" placeholder="update Pais" value="<?php echo  $id_pais; ?>" required="" class="form-control">
           <option value="2">EEUU</option>
           <option value="1">ESPAÑA</option>
           </select>
           </div>
           </div>
  <div class="form-group">
  	 <label for="estado">Estado</label>
     <div >
           <select name="estado" id="estado" placeholder="update estado" value="<?php echo  $estado; ?>" required="" class="form-control">
           <option value="A">Activo</option>
           <option value="I">Inactivo</option>
           </select>
           </div>
           </div>
    <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
       
    
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id_autor" value="<?php echo $id_autor ?>">
</form>