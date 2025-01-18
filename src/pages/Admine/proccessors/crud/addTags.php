<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();


    $requite = new Requites();
    $tags = new tags();

    if (isset($_POST['submitTags'])) {
        $namesTags = $_POST['tags'];
        if ($namesTags != null) {
            foreach ($namesTags as $tag) {
                $tags->setData(['tag_Titre' => $tag]);

                $tags->insertTags();
            }
        }
        header('Location: '. $_SERVER['HTTP_REFERER']);
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