<?php

    spl_autoload_register(function($class){
        require "./classes/". $class . ".class.php";
    });

    $cours = new Cours();
    


    if (isset($_POST['submitCours'])) {
        if ($_POST['content_type'] == 'video') {
            $type = 'video';
            $cours_contenu = base64_decode($_POST['video_url']);
            var_dump($_POST['video_url']);
        } else {
            $type = 'document';
            if (($_FILES['document']['size'] > 0) && ($_FILES['document']['size'] <= 5 *1024*1024)) {
                $cours_contenu = file_get_contents($_FILES['document']['tmp_name']);
            }
        }
        if ($_FILES['cours_image']['size'] > 0) {
            $cours_image = file_get_contents($_FILES['cours_image']['tmp_name']);
        }
        
        // $_POST['cours_titre']
        // $_POST['description']
        // $_POST['catalogue']
        // $_POST['tags']
    }