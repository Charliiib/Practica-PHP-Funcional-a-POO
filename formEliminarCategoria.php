<?php  
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $categoria = new categoria();
    $cantidad = $categoria->verProductoPorCategoria();
	include 'includes/header.html';  
    include 'includes/nav.php';  

?>

    <main class="container">
        <h1>Confirmacion de baja de una categoria</h1>
<?php  
        if ( $cantidad > 0 ){
?>  
        <div class="alert bg-light border-danger p-4">
        No se puede eliminar la categoria seleccionada, ya que hay productos relacionados.
        </div>
        <a href="adminCategorias.php" class="btn btn-outline-secondary"> Volver al panel</a>
<?php    
        }
        else {
            $categoria->verCategoriaPorID();
?>

        <div class=" bg-light border col-6 mx-auto p-2 text-danger">
        <form action="eliminarCategoria.php" method="post" >
Categoria a eliminar: <br>
            <input type="text" 
            name="catNombre" 
            value="<?= $categoria->getCatNombre() ?>">


            <input type="hidden" 
            name="idCategoria"
            value="<?= $categoria->getIdCategoria() ?>">

                       
            <button class="btn btn-danger btn-block  my-2">
                        Confirma baja
             </button>
            <a href="adminCategorias.php" class="btn btn-outline-secondary btn-block">
                        Volver al panel
            </a>
            </form>                    
            </div>
         
    <script>
                        Swal.fire({
                        title: '¿Desea eliminar la Categoria?',
                        text: "Esta accion no se puede deshacer!",
                       type: 'error',
                        showCancelButton: true,
                        cancelButtonColor: '#8fc87a',
                        cancelButtonText: 'No, no lo quiero eliminar',
                        confirmButtonColor: '#d00',
                        confirmButtonText: 'Si, lo quiero eliminar!'
                        }).then((result) => {
                        if (!result.value) {
                         // redireccion a adminProductos.
                         window.location = 'adminCategorias.php'
                        }
                        }); 
    </script>

 <?php    
        }
?>
    </main>

<?php  include 'includes/footer.php';  ?>
