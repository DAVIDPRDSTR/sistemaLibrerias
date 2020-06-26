<?php
include '../Template/header.php';
include '../Datos/conexion.php';

$sql = "SELECT l.id_libro, l.titulo, s.stock_min, s.stock_max, s.valor, s.descuento FROM stocklibro s, libro l where s.id_libro = l.id_libro;";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetchAll();

?>
<form method="post" action="../crud_libro/controladorLibro/crudLibro.php">

  <div class="form-group">
    <label for="exampleInputEmail1">Valor</label>
    <input type="number" class="form-control" id="descuentoLibro" name="descuentoLibro" aria-describedby="Descuento">
    <small id="emailHelp" class="form-text text-muted">Descuento aplicado a todos los libros de la tienda.</small>
  </div>

    <button type="submit" class="btn btn-primary" name="btnDescuento">Guardar descuento</button>
</form>
<br/>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Id</th>
            <th>TITULO</th>
            <th>STOCK MIN</th>
            <th>STOCK MAX</th>
            <th>VALOR</th>
            <th>DESCUENTO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $var) {
        ?>
        <tr>
            <td><?php echo $var['id_libro']; ?></td>
            <td><?php echo $var['titulo']; ?></td>
            <td><?php echo $var['stock_min']; ?></td>
            <td><?php echo $var['stock_max']; ?></td>
            <td><?php echo $var['valor']; ?></td>
            <td><?php echo $var['descuento']; ?></td>
        </tr>
          <?php
        }
        ?>      
    </tbody>
</table>

<?php
include '../Template/footer.php';
?>