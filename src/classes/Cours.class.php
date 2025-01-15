<?php
    spl_autoload_register(function($class){
        require $class .".class.php";
    });

    class Cours extends Catalogues {
        private $id_cours;
        private $cours_titre;
        private $description;
        private $cours_contenu;
        private $type;
        private $createDate;
        private $imageCours;
        private $id_user;

    }