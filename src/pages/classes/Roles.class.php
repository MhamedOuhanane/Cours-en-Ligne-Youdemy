<?php

    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class Roles {
        protected $id_role;
        protected $role;

        // private function __construct($url) {
            
        //     $current_url = $_SERVER['REQUEST_URI'];
        //     $source_index = '/Cours-en-Ligne-Youdemy/src/';

        //     if (($current_url != $source_index) && ($current_url != $source_index . 'index.php')) {
        //         header("Location: $source_index");
        //     } else {
        //         if ($role != null) {
        //             if ($role == 'Admine') {
        //                 # code...
        //             } if (condition) {
        //                 # code...
        //             } else {
        //                 # code...
        //             }
                    
        //         }
        //     }
        // }
    }