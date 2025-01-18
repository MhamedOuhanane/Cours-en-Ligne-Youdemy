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

        public function toStringDash() {
            echo '<div class="bg-white rounded-xl shadow-lg hover:shadow-black overflow-hidden hover:scale-105">
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-500">ID: #'. htmlspecialchars($this->id) .'</p>
                                    <h3 class="text-xl font-semibold text-gray-900">'. htmlspecialchars($this->tagTitre) .'</h3>
                                </div>
                                <div class="flex gap-2">
                                    <a href="?Modifier='.htmlspecialchars($this->id).'">
                                        <button class="text-blue-500 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="./crud/deletetags.php?Deletetags='.htmlspecialchars($this->id).'">
                                        <button class="text-red-500 hover:text-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    }