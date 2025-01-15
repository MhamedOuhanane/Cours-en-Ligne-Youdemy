<?php
    spl_autoload_register(function($class){
        require "../../../../classes/". $class .".class.php";
    });

    $idUser = $_GET['idUser'] ?? null;
    $status = $_GET['status'] ?? null;

    if ($idUser != null && $status != null) {
        if ($status == 'Activé') {
            
        }
    }