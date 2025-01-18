<?php
    spl_autoload_register(function($class){
        require $class .".class.php";
    });

    class Catalogues {
        protected $id_catalogue;
        protected $catalogue_titre;
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

        public function toString() {
            $rquite = new Requites();
            $Countvéhicule = $rquite->selectCount('cours', 'id_catalogue', $this->id_catalogue, 'int');

            echo '<div class="bg-white rounded-xl shadow-lg hover:shadow-black overflow-hidden">
                        <img src="data:image/png;base64,'. htmlspecialchars(base64_encode($this->catalogue_image)) .'" alt="Catalogue" class="w-full h-60 object-cover">
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-500">ID: #'. htmlspecialchars($this->id_catalogue) .'</p>
                                    <h3 class="text-xl font-semibold text-gray-900">'. htmlspecialchars($this->catalogue_titre) .'</h3>
                                </div>
                                <div class="flex gap-2">
                                    <a href="?Modifier='.htmlspecialchars($this->id_catalogue).'">
                                        <button class="text-blue-500 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="./crud/deleteCatégo.php?DeleteCatégorie='.htmlspecialchars($this->id_catalogue).'">
                                        <button class="text-red-500 hover:text-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <p class="text-gray-600 mt-2 pb-2">'. htmlspecialchars($this->catalogue_contenu) .'</p>
                            <div class="mt-4 pt-4 border-t">
                                <p class="text-gray-600">'.htmlspecialchars($Countvéhicule).' Cours disponibles</p>
                            </div>
                        </div>
                    </div>';
        }
    }