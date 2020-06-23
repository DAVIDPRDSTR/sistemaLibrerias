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
                            $sql = "SELECT * from editorial";
                            $query = $pdo->prepare($sql);
                            $query->execute();
                            $variable = $query->fetchAll();
                            ?>
                            <select id="editorial" name="editorial" class="form-control" required>
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach ($variable as $key => $value) : ?>
                                    <option value="<?php echo $value['id_editorial']; ?>"><?php echo $value['nombre']; ?></option>
                                <?php endforeach ?>
                            </select>
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
                            <input class="form-control" id="nump" name="nump" type="number" placeholder="numeros paginas" maxlength="3" rerequiredquire>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Año</label>
                            <input class="form-control" id="an" name="an" type="number" placeholder="año" maxlength="4" required>
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
                            <label for="disabledSelect">Estado</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnGuardar"><i class="fa fa-check-square"></i>
                        Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="funcion.js" type="text/javascript"></script>
