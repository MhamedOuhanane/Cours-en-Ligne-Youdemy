<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();
    $require = new Requites();

    $return = false;
    $id = $_GET['DeleteInscription'] ?? null;

    if (isset($id)) {
        if ($require->deleteWhere('inscriptioncours', 'id_inscription', $id)) {
        $return = true;
        }
    } 

    echo json_encode($return);
