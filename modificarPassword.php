<?php  
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $usuario = new usuario();
    $chequeo = $usuario->modificarPassword();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de contraseña</h1>
<?php
    $class = 'danger';
    $mensaje = 'No se pudo modificar la contraseña';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Contraseña modificado correctamente';
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