<?php

    ############ configuración general de sistema
    session_start();

    ##################################
    #######  autoloader
    ##################################
    function autoCarga( $nClase ){
        require_once 'clases/'.$nClase.'.php';
    }

    spl_autoload_register('autoCarga');
