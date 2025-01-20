<?php

    spl_autoload_register(function($class){
        require "../../../classes/". $class . ".class.php";
    });
    session_start();

    $requite = new Requites();
    
    if (isset($_GET['inscrit'])) {
        $idCour = $_GET['inscrit'] ?? null;
        $values = [
            'id_user' => $_SESSION['id_user'],
            'id_cour' => $idCour
        ];
        var_dump($values);
        if ($requite->insertData('inscriptioncours', $values)) {
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
    } 