<?php
include 'views/encabezado.php';
include '../Datos/conexion.php';

@$cod = $_GET["cod"];
if ($cod == "") {

} else { 
  $select="select * from usuario where id_usuario=$cod";
  $query=$pdo->prepare($select);
  $query->execute();
  $resultado=$query->fetchAll();
  foreach($resultado as $res){
    $nombre = $res['nombres'];
    $usuario = $res['email'];
    $password = $res['contraseña'];
    $rol = $res['id_rol'];
   
  }    
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3>Modificar Usuario</h3>
        </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">

      <form class="needs-validation" novalidate action="controlador/usuariosControlador.php" method="POST">
        <div class="form-row">
            <div class="col-md-6 mb-3">
              <input type="hidden" name="txtCodigo" class="form-control" value="<?php echo $cod;?>" required>
              <label for="validationCustom01">Apellidos y Nombres</label>
              <input type="text" name="txtNombre" class="form-control" id="validationCustom01" value="<?php echo $nombre;?>" value="" required>
              <div class="valid-feedback">
                Correcto!
              </div>
              <div class="invalid-feedback">
                Por favor ingrese Apellidos y Nombres
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationCustom02">Usuario</label>
              <input type="text" name="txtUsuario" class="form-control" id="validationCustom02" value="<?php echo $usuario;?>" required>
              <div class="valid-feedback">
               Correcto!
              </div>
              <div class="invalid-feedback">
                Por favor ingrese un usuario
              </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Contraseña</label>
                <input type="text" name="txtClave" class="form-control" id="validationCustom03" value="<?php echo $password;?>" required>
                <div class="valid-feedback">
                  Correcto!
                </div>
                <div class="invalid-feedback">
                  Por favor ingrese una contraseña
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Rol</label>
                <select name="cmbRol" class="custom-select" id="validationCustom04"  required="">
                  <option selected disabled value="">Seleccione un rol</option>
                  <option value="1">Administrador</option>
                  <option value="2">Invitado</option>
                </select>
                <div class="valid-feedback">
                  Correcto!
                </div>
                <div class="invalid-feedback">
                  Por favor seleccione un rol
                </div>
            </div>            
        </div>
        <button class="btn btn-primary" name="btnModificar" type="submit" >Modificar</button>
        <a href="listarUsuarios.php"><input type="button" class="btn btn-danger" value="Cancelar"></a>
      </form>
      </div>
    </div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<?php
}
?>