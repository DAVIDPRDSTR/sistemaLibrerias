<!--modal add-->
<div class="modal fade" id="modalAddLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Libro</h5>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="controladorLibro/crudLibro.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Editorial</label>
                            <?php
                            $sql = "SELECT e.id_editorial,e.nombre from editorial e";
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $variable = $query->fetchAll();
                            foreach ($variable as $key => $value) {
                                $ideditorial=$value['id_editorial'];
                                $nombreditorial=$value['nombre'];
                            ?>
                            <select id="editorial" name="editorial" class="form-control" required>
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="<?php echo $ideditorial; ?>"><?php echo $nombreditorial; ?></option>
                            </select>
                            <?php }?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Titulo</label>
                            <input class="form-control" id="titulo" name="titulo" type="text" placeholder="titulo" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Edicion</label>
                            <input class="form-control" id="edicion" name="edicion" type="text" placeholder="edicion" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Num paginas</label>
                            <input class="form-control" id="nump" name="nump" type="text" placeholder="numeros paginas" rerequiredquire>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Año</label>
                            <input class="form-control" id="an" name="an" type="text" placeholder="año" maxlength="4" onkeypress="return soloNumeros(event)" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Descripcion</label>
                            <input class="form-control" id="descripcion" name="descripcion" type="text" placeholder="descripcion" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="disabledSelect">Portada</label><br>
                            <img id="img" class="card-img-top" src="../images/images.jpg" height="100" width="100">
                            <br><br>
                            <input type="file" class="form-control-file" name="file" id="file" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="disabledSelect">Estados</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
                <button type="submit" class="btn btn-primary" name="btnGuardar"><i class="fa fa-check-square"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#file").change(function() {
        $("#guardar").prop("disabled", this.files.length == 0);
    });
</script>