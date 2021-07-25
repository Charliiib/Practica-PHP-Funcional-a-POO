<?php  
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Usuario = new Usuario;
    $chequeo = $Usuario->eliminarUsuario();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Eliminacion de un Usuario</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo eliminar el Usuario';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Usuario eliminado correctamente';
    }
?>
            <div class="alert alert-<?= $class ?>">
                <?= $mensaje ?>
                <br>
                <a href="adminUsuarios.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>

    </main>

<?php  include 'includes/footer.php';  ?>