<div class="modal fade" id="modalEliminar_<?php echo $value['id_libro']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Libro</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="controladorLibro/crudLibro.php">
                    <center>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="hidden" id="idlibro" name="idlibro" value="<?php echo $value['id_libro'] ?>">
                                <label for="disabledSelect">¿¿Seguro que desea eliminar este libro??</label><br>
                                <h3><?php echo $value['titulo'] ?></h3>
                                <h4><?php echo $value['descripcion'] ?></h4>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger" name="btnEliminar"><i class="fa fa-trash"></i>
                            Eliminar</button>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Cerrar</button>
            </div>
        </div>
    </div>
</div>

