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

        function AjouterData() {
            $values = [
                'id_cours' => $this->id_cours,
                'cours_titre' => $this->cours_titre,
                'description' => $this->description,
                'cours_contenu' => $this->cours_contenu,
                'type' => $this->type,
                'imageCours' => $this->imageCours,
                'id_user' => $this->id_user
            ];
        }

    }