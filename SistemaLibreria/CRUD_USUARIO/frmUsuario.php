<?php 
include 'views/encabezado.php';

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
          <h1>*** NUEVO USUARIO ***</h1>
        </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">

        <form class="needs-validation" novalidate action="controlador/usuariosControlador.php" method="POST">
        <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom01">Apellidos y Nombres</label>
              <input type="text" name="txtNombre"class="form-control" id="validationCustom01" placeholder="Apellidos y Nombres" value="" required>
              <div class="valid-feedback">
                Correcto!
              </div>
              <div class="invalid-feedback">
                Por favor ingrese Apellidos y Nombres
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <label for="validationCustom10">Dni</label>
              <input type="text" name="txtDni"class="form-control" id="validationCustom10" placeholder="Cédula / Pasaporte" value="" required>
              <div class="valid-feedback">
                Correcto!
              </div>
              <div class="invalid-feedback">
                Por favor ingrese # Cedula o Pasaporte
              </div>
            </div>
        </div>

          <div class="form-row">
              <div class="col-md-6 mb-3">
              <label for="validationCustom02">Email</label>
              <input type="text" name="txtUsuario" class="form-control" id="validationCustom02" placeholder="Email" value="" required>
              <div class="valid-feedback">
               Correcto!
              </div>
              <div class="invalid-feedback">
                Por favor ingrese un usuario
              </div>
            </div>
              
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Contraseña</label>
                <input type="password" name="txtClave" class="form-control" id="validationCustom03" placeholder="Contraseña" required>
                <div class="valid-feedback">
                  Correcto!
                </div>
                <div class="invalid-feedback">
                  Por favor ingrese una contraseña
                </div>
            </div>
          </div>
        <div class="form-row">
            
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Rol</label>
                <select name="cmbRol" class="custom-select" id="validationCustom04" required="">
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

            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Fecha Nacimiento</label>
                <input type="date" name="fecha" class="form-control" id="validationCustom05" require>
                
                <div class="valid-feedback">
                  Correcto!
                </div>
                <div class="invalid-feedback">
                  Por favor seleccione un fecha nacimiento
                </div>
            </div>
        </div>
          
          <div class="form-row">
            
              <div class="col-md-6 mb-3">
                 <label for="validationCustom06">Direccion</label>
                    <input type="text" name="txtDireccion"class="form-control" id="validationCustom06" placeholder="Domicilio" value="" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Por favor ingrese direccion
                </div>
             </div>
              
            <div class="col-md-3 mb-3">
              <label for="validationCustom07">Teléfono</label>
              <input type="text" name="txtTelefono"class="form-control" id="validationCustom07" placeholder="# Telefono" value="" required>
              <div class="valid-feedback">
                Correcto!
              </div>
              <div class="invalid-feedback">
                Por favor ingrese numero telefónico
              </div>
             </div>
              
          </div>  
          
        <button class="btn btn-primary" name="btnGuardar"type="submit">Registrar</button>
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
//include './Template/footer.php'; 
?>


