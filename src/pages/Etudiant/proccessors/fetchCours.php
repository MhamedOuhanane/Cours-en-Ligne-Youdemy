<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class .".class.php";
    });

    $requite = new Requites();

    $filterTag = $_GET['tagId'] ?? null;
    $filterCata = $_GET['CatalogueId'] ?? null;
    $Search = $_GET['Search'] ?? null;

    $Cours = $requite->fetchData('listecours', $filterCata, $filterTag, $Search);
    $FormerCours = array_map(function($array){
        return [
            'id_cour' => $array['id_cour'],
            'catalogue_titre' => $array['catalogue_titre'],
            'description' => $array['description'],
            'imageCours' => $array['imageCours'],
            'id_user' => $array['id_user'],
            'username' => $array['username'],
            'image' => base64_encode($array['image']),
            'createDate' => $array['createDate'],
            'id_tag' => $array['id_tag'],
            'tag_Titre' => $array['tag_Titre']
        ];
    }, $Cours);
    
    echo json_encode($FormerCours);
    
    
    
    
    
    
    