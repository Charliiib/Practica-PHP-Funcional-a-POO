<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $usuario = new usuario();
    $chequeo = $usuario->modificarCategoria();
    include 'includes/header.html';  
    include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una categoría</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo modificar la categoría';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Categoría modificada correctamente';
    }
?>
            <div class="alert alert-<?= $class ?>">
                <?= $mensaje ?>
                <br>
                <a href="adminCategorias.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>

    </main>

<?php  include 'includes/footer.php';  ?>