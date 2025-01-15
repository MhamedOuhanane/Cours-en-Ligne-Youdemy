<?php
    spl_autoload_register(function($class){
        require $class . ".classe.php";
    });

    class Users extends Roles {
        protected $id_user;
        protected $username;
        protected $email;
        protected $ville;
        protected $telephone;
        protected $image;
        protected $password;
        protected $status;


        public function __construct($ArrayUser)
        {
            $this->id_user = $ArrayUser['id_user'] ?? null;
            $this->username = $ArrayUser['username'] ?? null;
            $this->email = $ArrayUser['email'] ?? null;
            $this->ville = $ArrayUser['ville'] ?? null;
            $this->telephone = $ArrayUser['telephone'] ?? null;
            $this->image = $ArrayUser['image'] ?? null;
            $this->password = $ArrayUser['password'] ?? null;
            $this->status = $ArrayUser['status'] ?? null;
            $this->id_role = $ArrayUser['id_role'] ?? null;
            $this->role = $ArrayUser['role'] ?? null;
        }

        public function Inscription() {
            $requite = new Requites();
            $users = $requite->selectWhere('users', 'email', $this->email);
            if ($users == NULL) {
                $password = password_hash($this->password, PASSWORD_BCRYPT);
                $utilisateur = [
                    'username' =>$this->username,
                    'email' =>$this->email,
                    'password' =>$password,
                    'telephone' => $this->telephone,
                    'ville' => $this->ville,
                    'image' => $this->image,
                    'status' => $this->status,
                    'id_role' =>$this->id_role
                ];            
                
                $result = $requite->insertData('users', $utilisateur);
                if ($result) {
                    $message = "Le compts a ete crée avec succés.";
                    header('Location: ../connexion.php?message='.$message);
                    exit;
                }
                
            } else {
                $erreur = "Ce compts est déjat éxicte .";
                header('Location: ../inscription.php?erreur='.$erreur);
                exit;
            }
        }

        public function connexion() {
            $requite = new Requites();
            $users = $requite->selectWhere('users', 'email', $this->email);
            $roles = $requite->selectWhere('roles', 'id_role', $users['id_role']);
            $this->role = $roles['role'];

            if ($users != NULL) {
                if ($users['status'] == 'Activé') {
                    if (password_verify($this->password , $users['password'])) {
                        session_start();
                        $this->id_role = $users['id_role'];
                        $_SESSION['id_user'] = $users['id_user'];
                        $_SESSION['username'] = $users['username'];
                        $_SESSION['email'] = $users['email'];
                        $_SESSION['telephone'] = $users['telephone'];
                        $_SESSION['image'] = base64_encode($users['image']);
                        $_SESSION['ville'] = $users['ville'];
                        $_SESSION['role'] = $this->role;

                    } else {
                        $erreur = 'Le mot de pas est inccorect . ';
                        header("Location: ../connexion.php?erreur=$erreur");
                        exit;
                    }
                } else if ($users['status'] == 'En Vérification') {
                    $erreur = "Votre compte n'a pas encore été vérifié par l'administrateur, veuillez patienter.";
                    header("Location: ../connexion.php?erreur=$erreur");
                    exit;
                } else if ($users['status'] == 'Suspendu') {
                    $erreur = "Votre compte a été suspendu. Veuillez patienter, votre compte sera activé prochainement.";
                    header("Location: ../connexion.php?erreur=$erreur");
                    exit;
                }
            } else {
                $erreur = 'Cette Compts n\'existe pas .';
                header("Location: ../connexion.php?erreur=$erreur");
                exit;
            }
        }

        public function toStringUser() {
            if ($this->role != 'Admine' && $this->status != 'En Vérification') {
                $btnActive =  'cursor-not-allowed bg-gray-500';
                $btnSuspendu = 'cursor-not-allowed bg-gray-500';
                $urlA = '';
                $urlS = '';
                if ($this->status == 'Activé') {
                    $btnActive =  'bg-green-500 text-white hover:bg-green-600';
                    $urlS = 'pointer-events-none';
                } else if ($this->status == 'Suspendu') {
                    $btnSuspendu = 'bg-yellow-500 text-white hover:bg-yellow-600';
                    $urlA = 'pointer-events-none';
                }

                $styleUser = ($this->role == 'Etudiant') ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600';

                echo '<div class="utilisateurs bg-white rounded-xl shadow-lg p-6 hover:scale-[1.01]">
                            <div class="flex flex-col items-center mb-4">
                                <img src="data:image/png;base64,'. base64_encode($this->image) .'" alt="'. htmlspecialchars($this->role) .'" class="w-36 rounded-full mr-4">
                                <h4 class="font-bold">'. htmlspecialchars($this->username) .'</h4>
                                <p class="text-gray-500 text-sm"><span class="font-bold">Email: </span>'. htmlspecialchars($this->email) .'</p>
                                <p class="text-gray-500 text-sm"><span class="font-bold">Téle: </span> '. htmlspecialchars($this->telephone) .'</p>
                            </div>
                            <div class="flex justify-between items-center mr-3 mb-4">
                                <span class="px-3 py-1 '. $styleUser .' rounded-full text-sm">'. htmlspecialchars($this->role) .'</span>
                                <p class="text-gray-500 text-sm font-bold">'. htmlspecialchars($this->ville) .'</p>
                            </div>
                            <div class="flex gap-2">
                                <a href="./crud/gestionUser.php?idUser='. htmlspecialchars($this->id_user) .'&status=Activé" class="flex-1 '.htmlspecialchars($urlA).'">
                                    <button class="w-full '. $btnActive .' flex-1 rounded-lg">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </a>
                                <a href="./crud/gestionUser.php?idUser='. htmlspecialchars($this->id_user) .'&status=Suspendu" class="flex-1  '.htmlspecialchars($urlS).'">
                                    <button class="w-full '. $btnSuspendu .' rounded-lg">
                                        <i class="fas fa-pause "></i>
                                    </button>
                                </a>
                                <a href="./crud/gestionUser.php?idUser='. htmlspecialchars($this->id_user) .'&status=ban" class="flex-1 ">
                                    <button class="w-full flex-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                        <i class="fas fa-ban "></i>
                                    </button>
                                </a>
                            </div>
                        </div>';
            }
        }
    }