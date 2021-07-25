<?php  
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Categoria= new Categoria;
    $chequeo = $Categoria->eliminarCategoria();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Eliminacion de una Categoria</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo eliminar la Categoria';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Categoria eliminada correctamente';
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