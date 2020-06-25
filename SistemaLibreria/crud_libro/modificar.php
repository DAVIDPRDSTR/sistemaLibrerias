<div class="modal fade" id="modalmodificar_<?php echo $value['id_libro']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar libro</h5>
            </div>
                        <?php 
                        $cod = $value['id_libro'];
                        $sqll = "SELECT l.*, e.nombre as editorial from libro l join editorial e on l.id_editorial = e.id_editorial where l.id_libro = $cod and l.estado = 'A';";
                            $queryl = $pdo->prepare($sqll);
                            $queryl->execute();
                            $variablel = $queryl->fetchAll();
                            
                            foreach ($variablel as $resL) {           
                        ?>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="controladorLibro/crudLibro.php">
                    <input type="hidden" id="idlibro" name="idlibro" value="<?php echo $value['id_libro'] ?>">
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
                                
                                <?php foreach ($variable as $key => $value) : 
                                    if($resL['id_editorial'] == $value['id_editorial']){
                                        ?>
                                            <option selected="selected" value="<?php echo $resL['id_editorial']; ?>"><?php echo $resL['editorial']; ?></option>
                                            <?php
                                    }else{
                                        ?>
                                            <option value="<?php echo $value['id_editorial']; ?>"><?php echo $value['nombre']; ?></option>
                                            <?php
                                    }
                                    endforeach ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Titulo</label>
                            <input class="form-control" id="titulo" name="titulo" type="text" placeholder="titulo" value="<?php echo $resL['titulo'] ?>" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Edicion</label>
                            <input class="form-control" id="edicion" name="edicion" type="text" placeholder="edicion" value="<?php echo $resL['edicion'] ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Num paginas</label>
                            <input class="form-control" id="nump" name="nump" type="number" placeholder="numeros paginas" maxlength="3" value="<?php echo $resL['num_paginas'] ?>" rerequiredquire>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Año</label>
                            <input class="form-control" id="an" name="an" type="number" placeholder="año" maxlength="4" value="<?php echo $resL['ann'] ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="disabledSelect">Descripcion</label>
                            <input class="form-control" id="descripcion" name="descripcion" type="text" placeholder="descripcion" value="<?php echo $resL['descripcion'] ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="disabledSelect">Portada</label><br>
                                <img src="data:image/jpeg;base64, <?php echo base64_encode($resL['portada']); ?>" height="100" width="100" />
                            <br><br>
                            <input type="file" class="form-control-file" name="file" id="file">
                        </div>
                    </div>
                        <?php
                            }
                        ?>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="disabledSelect">Estado</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option selected disabled value="A">Activo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnModificar"><i class="fa fa-check-square"></i>
                        Modificar</button>
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
