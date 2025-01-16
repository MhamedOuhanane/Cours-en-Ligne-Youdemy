<?php
    spl_autoload_register(function($class){
        require $class .".class.php";
    });

    class Catalogues {
        protected $id_catalogue;
        private $catalogue_titre;
        private $catalogue_contenu;
        private $catalogue_image;

        public function setData($name, $value) {
            $this->$name = $value;
        }
        
        public function getData($name) {
            return $this->$name;
        }

        public function pagination($totalPage) {
            $rqt = new Requites();
            $countCata = $rqt->selectCount('catalogues');
            $btnpage = ceil($countCata/$totalPage);
            for ($i=1; $i < $btnpage+1; $i++) { 
                $stylePg = ($i == 1) ? 'bg-blue-600 text-white' : 'hover:bg-gray-100'; 
                echo '<input type="radio" id="page'.$i.'" name="pagination" value="'. $i .'" class="hidden">
                        <label for="page'.$i.'" class="px-4 py-2 border rounded-lg '. $stylePg .' cursor-pointer">'. $i .'</label>';
            }
        }

        public final function SelectorCatal($id) {
            $selected = ($id == $this->id_catalogue) ? "selected" : "" ;
            echo '<option '. $selected .' value="'. $this->id_catalogue .'">'. $this->catalogue_titre .'</option>';
        }

        public function AjouterData(){

        }
    }