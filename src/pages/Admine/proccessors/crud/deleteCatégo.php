<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();

    $return = false;

    $require = new Requites();
    if (isset($_GET['DeleteCatégorie'])) {
        $idCatego = $_GET['DeleteCatégorie'];
        if ($require->deleteWhere('catalogues', 'id_catalogue', $idCatego)) {
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
    } 