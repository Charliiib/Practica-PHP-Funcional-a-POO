<?php  

    require 'config/config.php';
    $datosUsuario = $_SESSION['datosUsuario'];
    $Autenticar = new autenticar;
    $Autenticar->logout();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Salir de sistema</h1>

        <div class="alert alert-info col-4 mx-auto p-4">
            Gracias <?= $datosUsuario ?> por su visita.
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>