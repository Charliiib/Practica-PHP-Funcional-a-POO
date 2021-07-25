<?php 
    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $usuario = new usuario();
    $usuarios = $usuario->verUsuarioPorID();
	include 'includes/header.html';  
    include 'includes/nav.php';  

?>

        <main class="container">
            <h1>Confirmacion de baja de un usuario</h1>

            <div class=" bg-light border col-6 mx-auto p-2">
            <form action="eliminarUsuario.php" method="post" >
    Marca: <br>
             <input type="text" 
                name="usuNombre" 
                value="<?= $usuario->getUsuNombre() ?>"
                class="form-control">
                <br>
    Apellido <br>
             <input type="text" 
                name="usuApellido" 
                value="<?= $usuario->getUsuApellido() ?>"
                class="form-control">
    <br>
    Email <br>
                <input type="text" 
                name="usuEmail" 
                value="<?= $usuario->getUsuEmail() ?>"
                class="form-control">
    <br>

            <input type="hidden" 
                name="idUsuario"
                value="<?= $usuario->getIdUsuario() ?>">

                       
                    <button class="btn btn-danger btn-block  my-2">
                        Confirma baja
                    </button>
                   <a href="adminUsuarios.php" class="btn btn-outline-secondary btn-block">
                        Volver al panel
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
                        window.location = 'adminUsuarios.php'
                    }
                })
            </script>

    </main>

<?php  include 'includes/footer.php';  ?>
