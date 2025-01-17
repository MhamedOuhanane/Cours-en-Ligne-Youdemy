<?php
    spl_autoload_register(function($class){
        require $class .".class.php";
    });

    class Cours extends Catalogues {
        private $id_cour;
        private $cours_titre;
        private $description;
        private $cours_contenu;
        private $type;
        private $createDate;
        private $imageCours;
        private $id_user;

        public function __construct($Arrays)
        {
            $this->id_cour = $Arrays['id_cours'] ?? null;
            $this->cours_titre = $Arrays['cours_titre'] ?? null;
            $this->description = $Arrays['description'] ?? null;
            $this->cours_contenu = $Arrays['cours_contenu'] ?? null;
            $this->type = $Arrays['type'] ?? null;
            $this->createDate = $Arrays['createDate'] ?? null;
            $this->imageCours = $Arrays['imageCours'] ?? null;
            $this->id_catalogue = $Arrays['id_catalogue'] ?? null;
            $this->id_user = $Arrays['id_user'] ?? null;
        }
        
        function getData($name)
        {
            return $this->$name;
        }

        function AjouterData() {
            $requite = new Requites();

            $values = [
                'cours_titre' => $this->cours_titre,
                'description' => $this->description,
                'cours_contenu' => $this->cours_contenu,
                'type' => $this->type,
                'imageCours' => $this-> imageCours,
                'id_catalogue' => $this->id_catalogue,
                'id_user' => $this->id_user
            ];

            return $requite->insertData('cours', $values);
        } 

        function UpdateCours($name, $valus) {
            $requite = new Requites();

            $values = [
                'id_cour' => $this->id_cour,
                'cours_titre' => $this->cours_titre,
                'description' => $this->description,
                'cours_contenu' => $this->cours_contenu,
                'type' => $this->type,
                'imageCours' => $this-> imageCours,
                'id_catalogue' => $this->id_catalogue,
                'id_user' => $this->id_user
            ];

            return $requite->update('cours', $values, 'id_cour', $this->id_cour);
        }
        
    }