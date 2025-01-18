<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class .".class.php";
    });
    session_start();
    $requite = new Requites();

    $filterTag = $_GET['tagId'] ?? "";
    $filterCata = $_GET['CatalogueId'] ?? "";
    $Search = $_GET['Search'] ?? "";
    
    $role = 'Visiteur';
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    }

    $Cours = $requite->fetchData('listecours', "id_catalogue",$filterCata, "id_tag", "cours_titre", "createDate", $filterTag, $Search);
    $FormerCours = array_map(function($array) use ($role){
        return [
            'id_cour' => $array['id_cour'],
            'cours_titre' => $array['cours_titre'],
            'catalogue_titre' => $array['catalogue_titre'],
            'description' => $array['description'],
            'imageCours' => $array['imageCours'],
            'id_user' => $array['id_user'],
            'username' => $array['username'],
            'image' => base64_encode($array['image']),
            'createDate' => $array['createDate'],
            'id_tag' => $array['id_tag'],
            'tag_Titre' => $array['tag_Titre'],
            'role' => $role
        ];
    }, $Cours);
    
    echo json_encode($FormerCours);
    
    
    
    
    
    
    