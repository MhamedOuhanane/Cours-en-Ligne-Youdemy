<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();


    if (isset($_POST['submitCours'])) {
        if ($_POST['content_type'] == 'video') {
            $type = 'video';
            $cours_contenu = base64_decode($_POST['video_url']);
        } else {
            $type = 'document';
            if (($_FILES['document']['size'] > 0) && ($_FILES['document']['size'] <= 5 *1024*1024)) {
                $cours_contenu = file_get_contents($_FILES['document']['tmp_name']);
            }
        }
        if ($_FILES['cours_image']['size'] > 0) {
            $cours_image = file_get_contents($_FILES['cours_image']['tmp_name']);
        }
        $ArrayCours = [
            'cours_titre' => $_POST['cours_titre'],
            'description' => $_POST['description'],
            'cours_contenu' => $cours_contenu,
            'type' => $type,
            'imageCours' => $cours_image,
            'id_user' => $_SESSION['id_user'],
            'id_catalogue' => $_POST['catalogue']
        ];  

        $cours = new Cours($ArrayCours);
        $insert = $cours->AjouterData();
        if ($insert) {
            if ($_POST['tags'] != null) {
                $requite = new Requites();
                $dernierCours = $requite->selectMAX('cours', 'id_cour');
            
                foreach($_POST['tags'] as $tagID){
                    $requite->insertData('tagcours', ['id_cour' => $dernierCours, 'id_tag' => $tagID]);
                }
            }
            header('Location: ../MesCours.php');
        }


        // $_POST['cours_titre']
        // $_POST['description']
        // $_POST['catalogue']
        // $_POST['tags']
    }