<?php 
    spl_autoload_register(function($class){
        require "../../../../classes/". $class .".class.php";
    });

    $requite = new Requites();
    
    $catalogues = $requite->selectAll('catalogues');
    if ($catalogues) {
        $formerCatalogues = array_map(function($row) use ($requite){
            $countCours = $requite->selectCount('cours', 'id_catalogue', $row['id_catalogue']);
            return [
                'id_catalogue' => $row['id_catalogue'],
                'catalogue_titre' => $row['catalogue_titre'],
                'catalogue_contenu' => $row['catalogue_contenu'],
                'catalogue_image' => base64_encode($row['catalogue_image']),
                'coursCount' => $countCours
            ];
        },$catalogues);
        
        echo json_encode($formerCatalogues);
    } else {
        echo json_encode([]);
    }

