<?php

class usuario
{
    private $idUsuario;
    private $usuNombre;
    private $usuApellido;
    private $usuPass;
    private $usuEmail;
    private $usuEstado;


    public function listarUsuarios()
    {
        $link = Conexion::conectar();
        $sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail, usuPass
                                    FROM usuarios";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    public function verUsuarioPorID()
    {
        $link = Conexion::conectar();
        $idUsuario = $_GET['idUsuario'];
        $sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail
                FROM usuarios
                WHERE idUsuario = ".$idUsuario;
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setIdUsuario( $datosUsuario['idUsuario'] );
        $this->setUsuNombre( $datosUsuario['usuNombre'] );
        $this->setUsuApellido( $datosUsuario['usuApellido'] );
        $this->setUsuEmail( $datosUsuario['usuEmail'] );
        return $this;
    }

    public function  agregarUsuario()
    {
        $usuNombre = $_POST[ 'usuNombre'];
        $usuApellido = $_POST[ 'usuApellido'];
        $usuEmail = $_POST[ 'usuEmail'];
        $usuPass = $_POST['usuPass'];
        $usuEstado = $_POST['usuEstado'];
        $link = Conexion::conectar();
        $sql = "INSERT INTO usuarios
                        ( usuNombre, usuApellido, usuEmail, usuPass, usuEstado  )
             VALUES
                        (:usuNombre, :usuApellido, :usuEmail, :usuPass, :usuEstado)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':usuNombre', $usuNombre, PDO::PARAM_STR);
        $stmt->bindParam(':usuApellido', $usuApellido, PDO::PARAM_STR);
        $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
        $stmt->bindParam(':usuPass', $usuPass, PDO::PARAM_STR);
        $stmt->bindParam(':usuEstado', $usuEstado, PDO::PARAM_INT);
        if( $stmt->execute() )
        {   // registramos atributos en el objeto
            $this->setIdUsuario( $link->lastInsertId() );
            $this->setUsuNombre($usuNombre);
            $this->setUsuApellido($usuApellido);
            $this->setUsuEmail($usuEmail);
            $this->setUsuPass($usuPass);
            $this->setUsuEstado($usuEstado);
            return true;
        }
        return false;
    }

    public function modificarUsuario()
    {
        $idUsuario = $_POST['idUsuario'];
        $usuNombre = $_POST['usuNombre'];
        $usuApellido = $_POST['usuApellido'];
        $usuEmail = $_POST['usuEmail'];
        $link = Conexion::conectar();
        $sql = "UPDATE usuarios
                SET usuNombre = :usuNombre,
                        usuApellido = :usuApellido,
                        usuEmail = :usuEmail
              WHERE idUsuario = :idUsuario";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':usuNombre', $usuNombre, PDO::PARAM_STR);
        $stmt->bindParam(':usuApellido', $usuApellido, PDO::PARAM_STR);
        $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
        if( $stmt->execute() )
        {
            $this->setIdUsuario( $idUsuario);
            $this->setUsuNombre($usuNombre);
            $this->setUsuApellido($usuApellido);
            $this->setUsuEmail($usuEmail);
            return true;
        }
        return false;
    }

    public function modificarPassword()
    {
        $idUsuario = $_POST['idUsuario'];
        $usuPass = $_POST['usuPass']; //ver xq usu pass1
        $link = Conexion::conectar();
        $sql = "UPDATE usuarios
                    SET usuPass = :usuPass
              WHERE idUsuario = :idUsuario";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':usuPass', $usuPass, PDO::PARAM_STR);
        if( $stmt->execute() )
        {
            $this->setIdUsuario( $idUsuario);
            $this->setUsuPass($usuPass);
            return true;
        }
        return false;
    }

    public function eliminarUsuario()
    {
        $idUsuario = $_POST['idUsuario'];
        $link = Conexion::conectar();
        $sql = "DELETE FROM usuarios
                    WHERE idUsuario = :idUsuario";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdUsuario($idUsuario);
            return true;
        }
        return false;
    }







    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getUsuNombre()
    {
        return $this->usuNombre;
    }

    /**
     * @param mixed $usuNombre
     */
    public function setUsuNombre($usuNombre): void
    {
        $this->usuNombre = $usuNombre;
    }

    /**
     * @return mixed
     */
    public function getUsuApellido()
    {
        return $this->usuApellido;
    }

    /**
     * @param mixed $usuApellido
     */
    public function setUsuApellido($usuApellido): void
    {
        $this->usuApellido = $usuApellido;
    }

    /**
     * @return mixed
     */
    public function getUsuPass()
    {
        return $this->usuPass;
    }

    /**
     * @param mixed $usuPass
     */
    public function setUsuPass($usuPass): void
    {
        $this->usuPass = $usuPass;
    }

    /**
     * @return mixed
     */
    public function getUsuEmail()
    {
        return $this->usuEmail;
    }

    /**
     * @param mixed $usuEmail
     */
    public function setUsuEmail($usuEmail): void
    {
        $this->usuEmail = $usuEmail;
    }
        /**
         * @return mixed
         */
        public function getUsuEstado()
    {
        return $this->usuEstado;
    }

        /**
         * @param mixed $usuEstado
         */
        public function setUsuEstado($usuEstado): void
    {
        $this->usuEstado = $usuEstado;
    }
}



