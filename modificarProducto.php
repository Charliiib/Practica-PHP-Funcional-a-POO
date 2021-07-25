<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $producto = new producto();
    $chequeo = $producto->modificarProducto();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de datos de un producto</h1>
<?php
        $class = 'danger';
        $mensaje = 'No se pudo modificar el producto';
        if( $chequeo ) {
            $class = 'success';
            $mensaje = 'Producto modificado correctamente';
        }
?>
        <div class="alert alert-<?= $class ?>">
            <?= $mensaje ?>
            <br>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel
            </a>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>