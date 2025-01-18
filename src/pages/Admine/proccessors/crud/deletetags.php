<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();

    $require = new Requites();
    $idTags = $_GET['Deletetags'] ?? null;

    if (isset($idTags)) {
        if ($require->deleteWhere('tags', 'id_tag', $idTags)) {
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
    } 