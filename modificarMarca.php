<?php

    require 'config/config.php';
        $autenticar = new autenticar();
        $autenticarse = $autenticar->autenticar();
        $marca = new marca();
        $chequeo = $marca->modificarMarca();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una marca</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo modificar la Marca';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Marca modificada correctamente';
    }
?>
            <div class="alert alert-<?= $class ?>">
                <?= $mensaje ?>
                <br>
                <a href="adminMarcas.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>

    </main>

<?php  include 'includes/footer.php';  ?>