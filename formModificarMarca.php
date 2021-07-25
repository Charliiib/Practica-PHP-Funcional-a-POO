<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $marca = new marca();
    $marcas = $marca->verMarcaPorID();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una marca</h1>

        <div class="bg-light border p-4">
            <form action="modificarMarca.php" method="post">
                Marca: <br>
                <input type="text" name="mkNombre"
                       value="<?= $marca->getMkNombre() ?>"
                       class="form-control">
                <input type="hidden" name="idMarca"
                       value="<?= $marca->getIdMarca() ?>">
                <br>
                <button class="btn btn-dark">Modificar marca</button>
                <a href="adminMarcas.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>