<?php
    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class tags {
        private $id;
        private $tagTitre;

        public function setData($Array){
            $this->id  = $Array['id_tag'];
            $this->tagTitre = $Array['tag_Titre'];
        }

        public function getData(){
            return [
                $this->id,
                $this->tagTitre
            ];
        }

        public function toString(){
            echo '<option value="'.htmlspecialchars($this->getData()[0]).'">'.htmlspecialchars($this->getData()[1]).'</option>';
        }
    }