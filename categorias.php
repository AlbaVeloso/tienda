<?php
include("partials/cabecera.php");
//Consulta para obtener las categorias
$sql = "select * from categorias";
$result = $conexion->query($sql);
?>
            <section>
            <div class="listado">
        <h1>Listado de categorias</h1>
        <table class="">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>              
            </thead>
            <tbody>
                <?php
                while ($fila = $result->fetch( PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['descripcion'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <hr>
        <h3>Nueva Categoria</h3>
        <form action="nueva_categoria.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre del proveedor">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Descripción de categoría">
            </div>
            <button>Guardar</button>
        </form>
        <hr>
        </section>
        
<?php
include("partials/footer.php");
?>