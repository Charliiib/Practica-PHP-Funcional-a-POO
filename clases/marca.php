<?php

class marca
{
    private $idMarca;
    private $mkNombre;

    public function listarMarcas()
    {
        $link = Conexion::conectar();
        $sql = "SELECT idMarca, mkNombre
                    FROM marcas";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $marcas;
    }
    public function verMarcaPorID()
    {
        $link = Conexion::conectar();
        $idMarca = $_GET['idMarca'];
        $sql = "SELECT idMarca, mkNombre
                        FROM marcas
                        WHERE idMarca = ".$idMarca;
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $datosMarca = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setIdMarca(  $datosMarca['idMarca'] );
        $this->setMkNombre(  $datosMarca['mkNombre'] );
        return $this;
    }


    public function agregarMarca()
    {
        $mkNombre = $_POST['mkNombre'];
        $link = Conexion::conectar();
        $sql = "INSERT INTO marcas
                       ( mkNombre )
                    VALUES 
                        (:mkNombre)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':mkNombre', $mkNombre, PDO::PARAM_STR);
        if( $stmt->execute() )
        {   // registramos atributos en el objeto
            $this->setMkNombre($mkNombre);
            $this->setIdmarca( $link->lastInsertId() );
            return true;
        }
        return false;
    }
    public function modificarMarca()
    {
        $idMarca = $_POST['idMarca'];
        $mkNombre   = $_POST['mkNombre'];
        $link = Conexion::conectar();
        $sql = "UPDATE marcas
                        SET mkNombre = :mkNombre
                      WHERE idMarca = :idMarca";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':mkNombre', $mkNombre, PDO::PARAM_STR);
        $stmt->bindParam(':idMarca', $idMarca, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdMarca( $idMarca );
            $this->setMkNombre( $mkNombre );
            return true;
        }
        return false;

    }

    public function eliminarMarca()
    {
        $idMarca = $_POST['idMarca'];
        $link = Conexion::conectar();
        $sql = "DELETE FROM marcas 
                        WHERE idMarca = :idMarca";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idMarca', $idMarca, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdMarca( $idMarca );
            return true;
        }
        return false;

    }



    public function verProductoPorMarca()
    {
        $link = Conexion::conectar();
        $idMarca = $_GET['idMarca'];
        $sql = "SELECT 1
                        FROM productos
                        WHERE idMarca = :idMarca";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idMarca', $idMarca, PDO::PARAM_INT);
        $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;

    }







    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * @param mixed $idMarca
     */
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;
    }

    /**
     * @return mixed
     */
    public function getMkNombre()
    {
        return $this->mkNombre;
    }

    /**
     * @param mixed $mkNombre
     */
    public function setMkNombre($mkNombre)
    {
        $this->mkNombre = $mkNombre;
    }



}