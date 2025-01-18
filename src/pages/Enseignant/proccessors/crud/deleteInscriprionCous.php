<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();

    $return = false;

    $require = new Requites();
    if (isset($_GET['DeleteCours'])) {
        $idCours = $_GET['DeleteCours'];
        if ($require->deleteWhere('cours', 'id_cour', $idCours)) {
        $return = true;
        }
    } 

    echo json_encode($return);
