<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();
    $requite = new Requites();

    if (isset($_POST['submitCours'])) {
        $cours_contenu = null;
        $cours_video = null;
        if ($_POST['content_type'] == 'video') {
            $type = 'video';
            $cours_video = $_POST['video_url'];
        } else {
            $type = 'document';
            if (($_FILES['document']['size'] > 0) && ($_FILES['document']['size'] <= 5 *1024*1024)) {
                var_dump($_FILES['document']['size']);
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
            'cours_video' => $cours_video,
            'type' => $type,
            'imageCours' => $cours_image,
            'id_user' => $_SESSION['id_user'],
            'id_catalogue' => $_POST['catalogue'],
            'status' => 'En Attente'
        ];  

        $cours = new Cours($ArrayCours);
        $insert = $cours->AjouterData();
        if ($insert == true) {
            if ($_POST['tags'] != null) {
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
    }  else if (isset($_POST['submitModiCours'])) {
        $cours_contenu = null;
        $cours_video = null;
        if ($_POST['content_type'] == 'video') {
                $type = 'video';
                $cours_video = $_POST['video_url'];
        } else {
            $type = 'document';
            if (($_FILES['document']['size'] > 0) && ($_FILES['document']['size'] <= 5 *1024*1024)) {
                $cours_contenu = file_get_contents($_FILES['document']['tmp_name']);
            }
        }
        $cours_image = null;
        if ($_FILES['cours_image']['size'] > 0) {
            $cours_image = file_get_contents($_FILES['cours_image']['tmp_name']);
        }
        $ArrayCours = [
            'id_cour' => $_GET['Modifier'],
            'cours_titre' => $_POST['cours_titre'],
            'description' => $_POST['description'],
            'type' => $type,
            'imageCours' => $cours_image,
            'id_catalogue' => $_POST['catalogue'],
        ];  

        if ($cours_contenu != null) {
            if ($_POST['content_type'] != 'video') {
                $ArrayCours['cours_contenu'] = $cours_contenu;
            } else {
                $ArrayCours['cours_contenu'] = $cours_video;
            }
            
            
        }
        if ($cours_image != null) {
            $ArrayCours['imageCours'] = $cours_image;
        }

        $cours = new Cours($ArrayCours);
        $update = $cours->UpdateCours();
        if ($update == true) {
            $delete = $requite->deleteWhere('tagcours', 'id_cour', $_GET['Modifier']);

            if (isset($_POST['tags']) && $delete == true) {
                foreach($_POST['tags'] as $tagID){
                    $requite->insertData('tagcours', ['id_cour' => $_GET['Modifier'], 'id_tag' => $tagID]);
                }
            }
            header('Location: ../MesCours.php');
        }
    }