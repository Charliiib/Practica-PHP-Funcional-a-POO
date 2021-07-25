<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de una nueva marca</h1>

        <div class="bg-light border p-4">
            <form action="agregarMarca.php" method="post">
                Marca: <br>
                <input type="text" name="mkNombre" class="form-control">
                <br>
                <button class="btn btn-dark">Agregar marca</button>
                <a href="adminMarcas.php" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>