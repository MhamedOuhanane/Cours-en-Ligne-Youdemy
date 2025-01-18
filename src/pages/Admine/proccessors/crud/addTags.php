<?php

    spl_autoload_register(function($class){
        require "../../../../classes/". $class . ".class.php";
    });
    session_start();


    $require = new Requites();
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
    } 