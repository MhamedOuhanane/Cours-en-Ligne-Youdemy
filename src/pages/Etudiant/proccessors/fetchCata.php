<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class .".class.php";
    });

    $requite = new Requites();

    $pagination = (int) ($_GET['pagination'] ?? 3);
    $NBpage = (int) ($_GET['NBpage'] ?? 1);
    
    $catalogues = $requite->selectAll('catalogues');
    
    $rows = []; 
    if ($catalogues) {
        $i = 0;
        $b = 0;
        foreach($catalogues as $catalogue) {
            $rows[$i][] = $catalogue;
            $b++;
            if ($b >= $pagination) {
                $b = 0;
                $i++;
            }
        }
        $formerCatalogues = array_map(function($row) use ($requite, $NBpage){
            $countCours = $requite->selectCount('cours', 'id_catalogue', $row['id_catalogue']);
            return [
                'id_catalogue' => $row['id_catalogue'],
                'catalogue_titre' => $row['catalogue_titre'],
                'catalogue_contenu' => $row['catalogue_contenu'],
                'catalogue_image' => base64_encode($row['catalogue_image']),
                'coursCount' => $countCours
            ];
        },$rows[$NBpage-1]);
        
        echo json_encode($formerCatalogues);
    } else {
        echo json_encode([]);
    }

