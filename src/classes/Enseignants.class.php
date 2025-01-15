<?php
    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class Enseignants extends Users {
        public function toStringUser() {
            if ($this->status == 'En Vérification') {
                echo '<div class="bg-white rounded-xl shadow-lg p-6 hover:scale-[1.01]">
                            <div class="flex flex-col items-center mb-4">
                                <img src="data:image/png;base64,'. htmlspecialchars($this->image) .'" alt="Enseignant" class="w-36 rounded-full mr-4">
                                <h4 class="font-bold">'. htmlspecialchars($this->username) .'</h4>
                                <p class="text-gray-500 text-sm">'. htmlspecialchars($this->email) .'</p>
                                <p class="text-gray-500 text-sm"><span class="font-bold">Téle: </span> '. htmlspecialchars($this->telephone) .'</p>
                            </div>
                            <div class="flex justify-between items-center mr-3 mb-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Enseignant</span>
                                <p class="text-gray-500 text-sm font-bold">'. htmlspecialchars($this->ville) .'</p>
                            </div>
                            <div class="flex gap-2">
                                <button data-valide="'. htmlspecialchars($this->id_user) .'" class="flex-1 border-2 border-green-500 text-green-500 hover:text-white rounded-lg hover:bg-green-600">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button data-refuse="'. htmlspecialchars($this->id_user) .'" class="flex-1 border-2 border-red-500 text-red-500 hover:text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>';
            }
        }
    }