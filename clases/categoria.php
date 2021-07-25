<?php

class categoria
{
    private $idCategoria;
    private $catNombre;

    public function listarCategorias()
    {
        $link = Conexion::conectar();
        $sql = "SELECT idCategoria, catNombre
                    FROM categorias";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categoria;
    }   
    public function verCategoriaPorID()
    {
        $link = Conexion::conectar();
        $idCategoria = $_GET['idCategoria'];
        $sql = "SELECT idCategoria, catNombre
                        FROM categorias
                        WHERE idCategoria = ".$idCategoria;
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $datosCategoria = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setIdCategoria(  $datosCategoria['idCategoria'] );
        $this->setCatNombre(  $datosCategoria['catNombre'] );
        return $this;
    }

    public function agregarCategoria()
    {
        $catNombre = $_POST['catNombre'];
        $link = Conexion::conectar();
        $sql = "INSERT INTO categorias
                       ( catNombre )
                    VALUES 
                        (:catNombre)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catNombre', $catNombre, PDO::PARAM_STR);
        if( $stmt->execute() )
        {   // registramos atributos en el objeto
            $this->setCatNombre($catNombre);
            $this->setIdCategoria( $link->lastInsertId() );
            return true;
        }
        return false;
    }
    public function modificarCategoria()
    {
        $idCategoria = $_POST['idCategoria'];
        $catNombre   = $_POST['catNombre'];
        $link = Conexion::conectar();
        $sql = "UPDATE categorias
                        SET catNombre = :catNombre
                      WHERE idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catNombre', $catNombre, PDO::PARAM_STR);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdCategoria($idCategoria );
            $this->setCatNombre($catNombre);
            return true;
        }
        return false;
    }

    public function eliminarCategoria()
    {
        $idCategoria = $_POST['idCategoria'];
        $link = Conexion::conectar();
        $sql = "DELETE FROM categorias 
                        WHERE idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdCategoria( $idCategoria );
            return true;
        }
        return false;

    }



    public function  verProductoPorCategoria()
    {
        $link = Conexion::conectar();
        $idCategoria = $_GET['idCategoria'];
        $sql = "SELECT 1
                        FROM productos
                        WHERE idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;

    }





    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    /**
     * @return mixed
     */
    public function getCatNombre()
    {
        return $this->catNombre;
    }

    /**
     * @param mixed $catNombre
     */
    public function setCatNombre($catNombre)
    {
        $this->catNombre = $catNombre;
    }



}













/*

    function verProductoPorCategoria()
{
    $idCategoria = $_GET['idCategoria'];
    $link = conectar();
    $sql = "SELECT 1
                        FROM productos
                        WHERE idCategoria = ".$idCategoria;
    $resultado = mysqli_query( $link, $sql )  
                            or die( mysqli_error($link) );
    $cantidad = mysqli_num_rows($resultado);
      return $cantidad;
}
    
    /*
     * listarCategorias()
     * verCategoriaPorID()
     * agregarCategoria()
     * modificarCategoria()
     * eliminarCategoria()
     * */