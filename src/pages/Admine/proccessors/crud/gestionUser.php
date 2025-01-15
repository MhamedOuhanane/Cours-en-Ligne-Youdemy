<?php
    spl_autoload_register(function($class){
        require "../../../../classes/". $class .".class.php";
    });

    $idUser = $_GET['idUser'] ?? null;
    $status = $_GET['status'] ?? null;

    if ($idUser != null && $status != null) {
        $values = [
            'id_user' => $idUser,
            'status' => $status
        ];
        $utilisateur = new Users($values);
        $utilisateur->UpdatStatus();       
    }