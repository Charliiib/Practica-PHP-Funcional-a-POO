<?php

    class Conexion
    {
        private function __construct()
        {} // evitamos que se instancie

        static function conectar()
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $link = new PDO(
                'mysql:host=localhost;dbname=catalogo',
                'root',
                '',
                $opciones
            );
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $link;
        }
    }