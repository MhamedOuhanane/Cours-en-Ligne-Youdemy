<?php 
    spl_autoload_register(function($class){
        require "../../../../classes/". $class .".class.php";
    });
    session_start();
    $requite = new Requites();

    $filterCata = $_GET['CatalogueId'] ?? "";
    $Search = $_GET['Search'] ?? "";
    

    $Cours = $requite->fetchData('listecours', $filterCata, "", $Search, $_SESSION['id_user']);
    $FormerCours = array_map(function($array) use ($requite){
        $etudiant = $requite->selectCount('inscriptioncours', 'id_cour', $array['id_cour']);
        return [
            'id_cour' => $array['id_cour'],
            'cours_titre' => $array['cours_titre'],
            'catalogue_titre' => $array['catalogue_titre'],
            'description' => $array['description'],
            'imageCours' => base64_encode($array['imageCours']),
            'id_user' => $array['id_user'],
            'username' => $array['username'],
            'image' => base64_encode($array['image']),
            'etudiants' => $etudiant,
            'createDate' => $array['createDate'],
            'status' => $array['status'],
            'id_tag' => $array['id_tag'],
            'tag_Titre' => $array['tag_Titre']
        ];
    }, $Cours);
    
    echo json_encode($FormerCours);
    
    
    
    
    
    
    