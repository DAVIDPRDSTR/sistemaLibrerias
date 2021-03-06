
<?php
	include 'toolbar.php';
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">add</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombres</label>
	   <input type="text" class="form-control" id="nombre_autor" name="nombre_autor" autofocus placeholder="Tus nombres" required>
  </div>
  <div class="form-group">
     <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Tu e-mail" required>
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
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El usuario ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear el usario, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>