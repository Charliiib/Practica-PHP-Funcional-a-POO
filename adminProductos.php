<?php


    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $producto = new producto();
    $productos = $producto->listarProductos();
    include 'includes/header.html';
    include 'includes/nav.php';

?>

    <main class="container">
        <h1>Panel de administración de productos </h1>

        <table class="table table-border table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>idProducto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Presentacion</th>
                <th>Imagen</th>
                <th colspan="2">
                    <a href="formAgregarProducto.php" class="btn btn-dark">
                        Agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($productos as $producto){
                ?>
                <tr>
                    <td><?= $producto['idProducto'] ?></td>
                    <td><?= $producto['prdNombre'] ?></td>
                    <td><?= $producto['prdPrecio'] ?></td>
                    <td><?= $producto['mkNombre'] ?></td>
                    <td><?= $producto['catNombre'] ?></td>
                    <td><?= $producto['prdPresentacion'] ?></td>
                    <td><img src="productos/<?= $producto['prdImagen'] ?>" class="img-thumbnail"></td>
                    <td>
                        <a href="formModificarProducto.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarProducto.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>


    </main>
<?php
include 'includes/footer.php';
?>