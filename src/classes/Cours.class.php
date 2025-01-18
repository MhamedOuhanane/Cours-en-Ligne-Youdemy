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
        private $status;
        private $imageCours;
        private $id_user;

        public function __construct($Arrays)
        {
            $this->id_cour = $Arrays['id_cour'] ?? null;
            $this->cours_titre = $Arrays['cours_titre'] ?? null;
            $this->description = $Arrays['description'] ?? null;
            $this->cours_contenu = $Arrays['cours_contenu'] ?? null;
            $this->type = $Arrays['type'] ?? null;
            $this->createDate = $Arrays['createDate'] ?? null;
            $this->imageCours = $Arrays['imageCours'] ?? null;
            $this->status = $Arrays['status'] ?? null;
            $this->id_catalogue = $Arrays['id_catalogue'] ?? null;
            $this->catalogue_titre = $Arrays['catalogue_titre'] ?? null;
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
                'status' => $this->status,
                'id_catalogue' => $this->id_catalogue,
                'id_user' => $this->id_user
            ];

            return $requite->insertData('cours', $values);
        } 

        function UpdateCours() {
            $requite = new Requites();

            $values = [
                'cours_titre' => $this->cours_titre,
                'description' => $this->description,
                'type' => $this->type,
                'id_catalogue' => $this->id_catalogue
            ];
            if ($this->cours_contenu != null) {
                $values['cours_contenu'] = $this->cours_contenu; 
            }
            if ($this->imageCours != null) {
                $values['imageCours'] = $this->imageCours; 
            }
            var_dump($this->id_cour);

            return $requite->update('cours', $values, 'id_cour', $this->id_cour);
        }

        function toString()
        {
            echo '<div class="bg-white rounded-lg shadow-md overflow-hidden">
                                            <div class="relative">
                                                <img src="data:image/pnp;base64,'. htmlspecialchars(base64_encode($this->imageCours)) .'" alt="Course" class="w-full h-48 object-cover">
                                                <span class="absolute top-4 right-4 px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-500">
                                                    '. htmlspecialchars($this->status) .'
                                                </span>
                                            </div>
                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold mb-2 min-h-14">'. htmlspecialchars($this->cours_titre) .'</h3>
                                                <p class="text-gray-600 text-sm mb-4">'. htmlspecialchars($this->description) .'</p>
                                                <p class="text-gray-600 text-sm mb-4"> <i class="fas fa-folder w-6"></i> '. htmlspecialchars($this->catalogue_titre) .'</p>
                                                <div class="flex items-center justify-between mb-4">
                                                    <span class="text-sm text-gray-500">
                                                        <i class="fas fa-clock mr-2"></i>
                                                        '. htmlspecialchars($this->createDate) .'
                                                    </span>
                                                </div>
                                                <div class="flex justify-end space-x-4">
                                                    <a href="./crud/StatusCours.php?idCours='. htmlspecialchars($this->id_cour) .'&status=Publicé" class="flex-1 bg-green-500 text-white hover:bg-green-600">
                                                        <button class="w-full flex-1 rounded-lg">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </a>
                                                    <a href="./crud/StatusCours.php?idCours='. htmlspecialchars($this->id_cour) .'&status=Refusé" class="flex-1 bg-red-500 text-white hover:bg-red-600">
                                                        <button class="w-full  rounded-lg">
                                                            <i class="fas fa-refuse "></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>';
        }
    }