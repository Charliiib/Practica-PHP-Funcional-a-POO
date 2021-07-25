<?php
##### ver en agencia #####
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Categoria= new Categoria;
    $chequeo = $Categoria->agregarCategoria();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de una categoria</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo agregar la categoría';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Categoría agregada correctamente';
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