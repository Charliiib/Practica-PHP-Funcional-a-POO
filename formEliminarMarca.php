<?php  

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $marca = new marca();
    $cantidad = $marca->verProductoPorMarca();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Confirmación de baja de una marca</h1>
<?php
    if( $cantidad > 0 ){
?>
        <div class="alert bg-light border-danger p-4 col-8 mx-auto">
            No se puede eliminar la marca seleccionada,
            ya que hay productos relacionados.
            <br>
            <a href="adminMarcas.php" class="btn btn-outline-secondary">
                Volver a panel
            </a>
        </div>
<?php
    }
    else{
        $marca->verMarcaPorID();
?>
        <div class="card border-danger col-6 mx-auto p-4 text-danger">
            Marca a eliminar:
            <?= $marca->getMkNombre() ?>
            <form action="eliminarMarca.php" method="post">
                <input type="hidden" name="idMarca"
                       value="<?= $marca->getIdMarca() ?>">
                <button class="btn btn-danger btn-block my-2">
                    Confirmar baja
                </button>
                <a href="adminMarcas.php" class="btn btn-outline-secondary btn-block">
                    volver a panel
                </a>
            </form>
        </div>

        <script>
            Swal.fire({
                title: '¿Desea eliminar la marca?',
                text: "Esta acción no se puede deshacer.",
                type: 'error',
                showCancelButton: true,
                cancelButtonColor: '#8fc87a',
                cancelButtonText: 'No, no la quiero eliminar',
                confirmButtonColor: '#d00',
                confirmButtonText: 'Si, la quiero eliminar'
            }).then((result) => {
                if (!result.value) {
                    //redirección a adminMarcas
                    window.location = 'adminMarcas.php'
                }
            })
        </script>
<?php
    }
?>


    </main>

<?php  include 'includes/footer.php';  ?>