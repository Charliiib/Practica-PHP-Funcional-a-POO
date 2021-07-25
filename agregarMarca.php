<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Marca= new Marca;
    $chequeo = $Marca->agregarMarca();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de una marca</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo agregar la Marca';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Marca agregada correctamente';
    }
?>
            <div class="alert alert-<?= $class ?>">
                <?= $mensaje ?>
                <br>
                <a href="adminMarcas.php" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </div>

    </main>

<?php  include 'includes/footer.php';  ?>