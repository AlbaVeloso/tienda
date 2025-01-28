<?php
include("partials/cabecera.php");
//Consulta para obtener los proveedores
$sql = "select * from proveedores order by id desc";
$result = $conexion->query($sql);
?>

<section>
    <div class="listado">
        <h1>Proveedores</h1>
        <table class="fa-solid fa-boxes-packing">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Web</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $result->fetch( PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['web'] . "</td>";
                    echo "<td> <a href='proveedor?id=" . $fila['id'] . "'>Ver</a> | <a href='editar_proveedor.php?id=" . $fila['id'] . "'>Editar</a> | <a href='eliminar_proveedor.php?id=" . $fila['id'] . "'>Eliminar</a> | <a href='proveedores?id=" . $fila['id'] . "'>Añadir</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <hr>
        <h3>Nuevo Proveedor</h3>
        <form action="nuevo_proveedor.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre del proveedor">
            </div>
            <div class="form-group">
                <label for="web">Web:</label>
                <input type="text" name="web" id="web" class="form-control" required placeholder="Web del proveedor">
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
        <hr>
        <?php if(isset($_GET["id"])){?>
        <div class="contacto">
            <div>
                <h3>Nueva dirección</h3>
                <form action="nueva_direccion.php" method="post">
                    <input type="hidden" name="idproveedor" value="<?php echo $_GET["id"];?>">
                    <label for="calle">Calle</label>
                    <input type="text" name="calle" id="calle" required placeholder="Calle">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" required placeholder="Número">
                    <label for="ciudad">Comuna</label>
                    <input type="text" name="comuna" id="comuna" required placeholder="Comuna">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" required placeholder="Ciudad">
                    <input type="submit" value="Guardar">
                    <input type="reset" value="Cancelar">
                </form>
            </div>
            <div>
                <h3>Nuevo teléfono</h3>
                <form action="nuevo_telefono.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" required placeholder="Teléfono">
                    <input type="submit" value="Guardar">
                    <input type="reset" value="Cancelar">                 
                </form>
            </div> 
            <a href="proveedores.php">Volver</a>
            <?php } ?>      
        </div>

</section>
<?php
include("partials/footer.php");
?>