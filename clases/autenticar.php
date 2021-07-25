<?php

class autenticar
{
    public function login()
    {
        // validar + registrar login
        $usuEmail = $_POST['usuEmail'];
        $usuPass = $_POST['usuPass'];
        $link = Conexion::conectar();
        $sql = 'SELECT usuNombre, usuApellido, idUsuario
                            FROM usuarios
                            WHERE usuEmail = :usuEmail
                              AND usuPass = :usuPass';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':usuEmail', $usuEmail, PDO::PARAM_STR);
        $stmt->bindParam(':usuPass', $usuPass, PDO::PARAM_STR);

        $stmt->execute();
        $cantidad = $stmt->rowCount();
        if( $cantidad == 0 ){
            //redirección a formLogin con mesaje de error
            header('location: formLogin.php?error=1');
        }
        else{
            $_SESSION['login'] = 1;
            $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['datosUsuario'] = $datosUsuario['idUsuario'];
            $_SESSION['idUsuario'] = $datosUsuario['idUsuario'];
            $_SESSION['datosUsuario'] = $datosUsuario['usuNombre'] . ' ' . $datosUsuario['usuApellido'];
            $_SESSION['usuNombre'] = $datosUsuario['usuNombre'];
            $_SESSION['usuApellido'] = $datosUsuario['usuApellido'];
            //redirección a admin
            header('location: admin.php');
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('refresh:3; url=index.php');
    }

    public function autenticar()
    {
        if(!isset($_SESSION['login'])){
            header('location: formLogin.php?error=2');  //ver capaz sea error 2
        }
    }

}