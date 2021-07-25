    <?php  

    require 'config/config.php';
    $categoria = new categoria();
    $categorias = $categoria->listarCategorias();
    $producto = new producto();
    $productos = $producto->verProductoPorID();
	include 'includes/header.html';  
	include 'includes/nav.php';  
/*




	################ AGREGAR LOS BOTONES DE ENCARGO X WSP CORRECTAMENTE
*/
?>


 <main class="container mt-1">

 <div class="  col-md-8 col-sm-12  mx-auto " >
            <div class=" row  " >
                <div class="col-md-8 col-sm-12 my-2" >
					<img src="productos/<?= $producto->getPrdImagen() ?>" class="img-thumbnail">
					
				</div>
				
                <div class="col text-secondary my-5" >
                    <h2><?= $producto->getPrdNombre() ?></h2> 
                    <hr>
                    Descripcion: <?= $producto->getPrdPresentacion() ?><br> 
                    <hr>
                    Precio: <span class="lead">
                                $<?= $producto->getPrdPrecio() ?>
                            </span>
                    <form action="#.php" method="post">
                        <input type="hidden" name="idProducto"
                               value="<?= $producto->getIdProducto()?>">

                        <button class="btn btn-info btn-block my-2">
                            Añadir al carrito
                        </button>
				   <div>
				 
				   </div>
						
					</form>
					</div>
				
            </div>
			<a   href="index.php" class="btn btn-outline-secondary  mx-auto " style="width: 200px; ">
					Volver al Inicio
					</a>
            
	
		
            <div class="share mt-2">
				<h5>Compartir Producto:</h5>
				<ul class="share_nav mr-2">
					<a  class=" mr-2" href="#"><i class="fab fa-facebook-f  fa-2x"></i></a>
					<a  class=" mr-2" href="#"><i class="far fa-envelope  fa-2x"></i></a>
					<a  class=" mr-2" href="#"><i class="fab fa-instagram  fa-2x"></i></a>
					<a  class=" mr-2" href="#"><i class="fab fa-whatsapp  fa-2x"></i></a>
				</ul>
			</div>
					
        </div>
<br><hr>
</main>



<?php  include 'includes/footer.php';  ?>
