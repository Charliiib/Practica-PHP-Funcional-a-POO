<?php  

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $producto = new producto();
    $productos = $producto->verProductoPorID();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Confirmación de baja de un producto</h1>

        <div class="card border-danger col-6 mx-auto p-2">
            <div class="row">
                <div class="col">
                    <img src="productos/<?= $producto->getPrdImagen() ?>" class="img-thumbnail">
                </div>
                <div class="col text-danger">
                    <h2><?= $producto->getPrdNombre() ?></h2>
                    Categoria: <?= $producto->getCatNombre() ?> <br>
                    Marca: <?= $producto->getMkNombre() ?> <br>
                    Presentación: <?= $producto->getPrdPresentacion() ?><br>
                    Precio: <span class="lead">
                                $<?= $producto->getPrdPrecio() ?>
                            </span>
                    <form action="eliminarProducto.php" method="post">
                        <input type="hidden" name="idProducto"
                               value="<?= $producto->getIdProducto() ?>">
                        <button class="btn btn-danger btn-block my-2">
                            Confirmar baja
                        </button>
                        <a href="adminProductos.php" class="btn btn-outline-secondary btn-block">
                            Volver a panel
                        </a>
                    </form>

                </div>
            </div>
        </div>

        <script>
            Swal.fire({
                title: '¿Desea eliminar el producto?',
                text: "Esta acción no se puede deshacer.",
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#8fc87a',
                cancelButtonText: 'No, no lo quiero eliminar',
                confirmButtonColor: '#d00',
                confirmButtonText: 'Si, lo quiero eliminar'
            }).then((result) => {
                if (!result.value) {
                    //redirección a adminProductos
                    window.location = 'adminProductos.php'
                }
            })
        </script>

    </main>

<?php  include 'includes/footer.php';  ?>