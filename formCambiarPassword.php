<?php
    require 'config/config.php';

      $_SESSION['login'];

	include 'includes/header.html';  
    include 'includes/nav.php';  

?>

    <main class="container">
        <h1>Cambiar Contraseña</h1>

<div class="bg-light border p-4">

<form action="modificarPassword.php" method="post">


Ingrese contraseña nueva: <br>
<input type="password" 
            name="usuPass"
            value=""
             class="form-control"> <!-- porque en la tabla marcas se llama asi  es una regla   -->
<br>
Confirme contraseña: <br>
<input type="password" 
            name="usuPass"
            value=""
             class="form-control">


<input type="hidden" 
            name="idUsuario"
            value="<?= $_SESSION['idUsuario'] ?>">


<button class="btn btn-dark">Guardar cambios</button>

<a href="adminUsuarios.php" class="btn btn-outline-secondary">Volver  a panel</a>

</form>


</div>


    </main>

<?php  include 'includes/footer.php';  ?>