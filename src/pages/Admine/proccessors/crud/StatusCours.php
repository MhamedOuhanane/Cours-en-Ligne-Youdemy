<?php
    spl_autoload_register(function($class){
        require "../../../../classes/". $class .".class.php";
    });

    $idCours = $_GET['idCours'] ?? null;
    $status = $_GET['status'] ?? null;

    var_dump($status);
    if ($status != null) {
        $values = [
            'status' => $status,
        ];
        var_dump($values);
        $requite = new Requites();
        if ($requite->update('cours', $values, 'id_cour', $idCours)) {
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }       
    }