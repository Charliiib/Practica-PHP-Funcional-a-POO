<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $marca = new marca();
    $marcas = $marca->listarMarcas();
    $categoria = new categoria();
    $categorias = $categoria->listarCategorias();
    $producto = new producto();
    $productos = $producto->verProductoPorID();
	include 'includes/header.html';
	include 'includes/nav.php';  


?>

    <main class="container">

        <h1>Modificación de un producto</h1>

        <div class="alert alert-secondary p-8 col-8 mx-auto">
            <form action="modificarProducto.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="prdNombre">Nombre del Producto</label>
                    <input type="text" name="prdNombre"
                           value="<?= $producto->getPrdNombre()?>"
                           class="form-control" id="prdNombre" required>
                </div>

                <label for="prdPrecio">Precio del Producto</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio"
                           value="<?= $producto->getPrdPrecio() ?>"
                           class="form-control" id="prdPrecio" min="0" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="idMarca">Marca</label>
                    <select class="form-control" name="idMarca" id="idMarca" required>
                        <option value="<?= $producto->getIdMarca() ?>"><?= $producto->getMkNombre() ?></option>
<?php
            foreach ( $marcas as $marca ){
?>
                        <option value="<?= $marca['idMarca'] ?>"><?= $marca['mkNombre'] ?></option>
<?php
            }
?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idCategoria">Categoría</label>
                    <select class="form-control" name="idCategoria" id="idCategoria" required>
                        <option value="<?= $producto->getIdCategoria() ?>"><?= $producto->getCatNombre() ?></option>
<?php
            foreach ( $categorias as $categoria ){
?>                        
                        <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></option>
<?php
            }
?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prdPresentacion">Presentación del Producto</label>
                    <textarea name="prdPresentacion" class="form-control" id="prdPresentacion" 
                              required><?= $producto->getPrdPresentacion() ?></textarea>
                </div>

                <div class="form-group">
                    <label for="prdStock">Stock del Producto</label>
                    <input type="number" name="prdStock"
                           value="<?= $producto->getPrdStock() ?>"
                           class="form-control" id="prdStock" min="0" required>
                </div>

                <div class="form-group">
                    <label for="prdImagen">Imagen del Producto:
                        <br>
                        <img src="productos/<?= $producto->getPrdImagen() ?>" class="img-thumbnail">
                    </label>
                    <input type="file" name="prdImagen" class="form-control-file" id="prdImagen">
                </div>

                <input type="text" name="prdImagenOriginal"
                       value="<?= $producto->getPrdImagen() ?>">
                
                <input type="number" name="idProducto"
                       value="<?= $producto->getIdProducto() ?>">
                
                <button class="btn btn-dark mr-3 px-4">Modificar producto</button>
                <a href="adminProductos.php" class="btn btn-outline-secondary">
                    Volver a panel de productos
                </a>

            </form>
        </div>
    </main>

<?php  include 'includes/footer.php';  ?>