<?php  

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Marca = new Marca;
    $chequeo = $Marca->eliminarMarca();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Baja de una marca</h1>
<?php
        $class = 'danger';
        $mensaje = 'No se pudo eliminar la marca';
        if( $chequeo ) {
            $class = 'success';
            $mensaje = 'Marca eliminada correctamente';
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