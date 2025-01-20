<?php 
    spl_autoload_register(function($class){
        require "../../../../classes/". $class .".class.php";
    });
    session_start();
    $requite = new Requites();

    $filterCata = $_GET['CatalogueId'] ?? "";
    $Search = $_GET['Search'] ?? "";
    

    $Etud = $requite->fetchData('listeinscriptioncours', 'id_catalogue', $filterCata, "","", "username", "createDate", $Search, null,"id_enseign", $_SESSION['id_user']);
    $FormerCours = array_map(function($array){
        return [
            'id_inscription' => $array['id_inscription'],
            'id_user' => $array['id_user'],
            'image' => base64_encode($array['image']),
            'username' => $array['username'],
            'email' => $array['email'],
            'cours_titre' => $array['cours_titre'],
            'date_inscret' => $array['date_inscret'],
            'id_catalogue' => $array['id_catalogue'],
            'catalogue_titre' => $array['catalogue_titre']
        ];
    }, $Etud);

    
    echo json_encode($FormerCours);
    
    
    