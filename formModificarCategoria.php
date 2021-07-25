<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $categoria = new categoria();
    $categorias = $categoria->verCategoriaPorID();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una categoría</h1>

        <div class="bg-light border p-4">
            <form action="modificarCategoria.php" method="post">
                Categoría: <br>
                <input type="text" name="catNombre" 
                       value="<?= $categoria->getCatNombre() ?>"
                       class="form-control">
                <input type="hidden" name="idCategoria"
                       value="<?= $categoria->getIdCategoria() ?>">
                <br>
                <button class="btn btn-dark">Modificar categoría</button>
                <a href="adminCategorias.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>