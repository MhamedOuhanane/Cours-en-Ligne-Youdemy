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

        public function toString($tags = null){
            $selected = "";
            if ($tags != null) {
                foreach($tags as $tag) {
                    if ($tag['id_tag'] == $this->id) {
                        $selected = "selected";
                    }
                }
            }
            echo '<option '. htmlspecialchars($selected) .' value="'.htmlspecialchars($this->id).'">'.htmlspecialchars($this->tagTitre).'</option>';
        }
    }