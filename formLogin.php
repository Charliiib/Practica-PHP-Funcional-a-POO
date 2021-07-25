<?php  

    require 'config/config.php';
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Ingreso a sistema</h1>

        <div class="alert bg-light p-4 border col-8 mx-auto">
            <form action="login.php" method="post">
                Usuario: <br>
                <input type="text" name="usuEmail" class="form-control">
                <br>
                Contraseña: <br>
                <input type="password" name="usuPass" class="form-control">
                <br>
                <button class="btn btn-dark btn-block py-2">
                    Ingresar a sistema
                </button>
            </form>
        </div>

        <?php
        if( isset($_GET['error']) ){
            //capturamos error
            $error = $_GET['error'];
            $mensaje = 'Nombre de usuario y/o contraseña incorrectos.';
            if( $error == 2 ){
                $mensaje = 'Debe loguearse para operar el sistema.';
            }
            ?>
            <div class="alert alert-danger col-8 mx-auto p-3">
                <i class="fas fa-exclamation-triangle"></i>
                <?= $mensaje ?>
            </div>
            <?php
        }
        ?>
            
    </main>

<?php  include 'includes/footer.php';  ?>