<?php

    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Dashboard - Panel principal</h1>
<?php
// si está logueado
if ( isset( $_SESSION['login'] ) ){
    ?>

       <h2> Bienvenido     <?= $_SESSION['datosUsuario'] ?> </h2>

    <?php
}
    ?>


        <section class="list-group">
            <a href="adminMarcas.php" class="list-group-item list-group-item-action">
                Panel de administración de Marcas.
            </a>
            <a href="adminCategorias.php" class="list-group-item list-group-item-action">
                Panel de administración de Categorías.
            </a>
            <a href="adminProductos.php" class="list-group-item list-group-item-action">
                Panel de administración de Productos.
            </a>
            <a href="adminUsuarios.php" class="list-group-item list-group-item-action">
                Panel de administración de Usuarios.
            </a>
        </section>

    </main>

<?php  include 'includes/footer.php';  ?>