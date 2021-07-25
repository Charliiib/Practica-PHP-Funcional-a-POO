<?php
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $Usuario= new Usuario;
    $chequeo = $Usuario->agregarUsuario();
	include 'includes/header.html';  
    include 'includes/nav.php';  
    
?>

    <main class="container">
        <h1>Alta de un Usuario</h1>
        <?php
    $class = 'danger';
    $mensaje = 'No se pudo agregar el usuario';
    if( $chequeo ) {
        $class = 'success';
        $mensaje = 'Usuario agregado correctamente';
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