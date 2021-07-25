<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Producto= new Producto;
    $chequeo = $Producto->agregarProducto();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de un nuevo producto</h1>
<?php
        $class = 'danger';
        $mensaje = 'No se pudo agregar el producto';
        if( $chequeo ) {
            $class = 'success';
            $mensaje = 'Producto agregado correctamente';
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