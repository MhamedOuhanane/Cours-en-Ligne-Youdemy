<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();


    $requite = new Requites();
    $catalogue = new Catalogues();

    if (isset($_POST['submitCatégorie'])) {
        $catalogueTitre = $_POST['catalogue_titre'];
        $catalogueDescr = $_POST['catalogue_contenu'];
        if ($_FILES['catalogue_image']['size'] > 0) {
            $catalogueImage = file_get_contents($_FILES['catalogue_image']['tmp_name']);
        }

        $listeCata = $requite->selectWhere('catalogues', 'catalogue_titre', $catalogueTitre);
        if ($listeCata == null) {
    
            $catalogue->setData('catalogue_titre',$catalogueTitre);
            $catalogue->setData('catalogue_contenu', $catalogueDescr);            
            $catalogue->setData('catalogue_image', $catalogueImage);

            $catalogue->AjouterData();
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
        else {
            $error = "Le catalogue $catalogueTitre est déjat existe!!" ;
            header('Location: '. $_SERVER['HTTP_REFERER']. '?Errour='. $error);
        }
    } else if (isset($_POST['submitModifTags'])) {
        $name = $_POST['tags'][0];
        $listetags = $requite->selectWhere('tags', 'tag_Titre', $_POST['tags'][0]);
        if ($listetags == null) {
            if ($requite->update('tags', ['tag_Titre' => $name], 'id_tag', $_GET['idTag'])) {
                header('Location: ../Tags.php');
            }
        } else {
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }

    }