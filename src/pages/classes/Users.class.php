<?php
    spl_autoload_register(function($class){
        require $class . ".classe.php";
    });

    class Users extends Roles {
        private $id_user;
        private $username;
        private $email;
        private $ville;
        private $telephone;
        private $image;
        private $password;
        private $status;


        public function __construct($ArrayUser)
        {
            $this->username = $ArrayUser['username'];
            $this->email = $ArrayUser['email'];
            $this->ville = $ArrayUser['ville'];
            $this->telephone = $ArrayUser['telephone'];
            $this->image = $ArrayUser['image'];
            $this->password = $ArrayUser['password'];
            $this->status = $ArrayUser['status'];
            $this->id_role = $ArrayUser['id_role'];
            $this->role = $ArrayUser['role'];
        }

        public function Inscription() {
            $requite = new Requites();
            $users = null;
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
                header('Location: ../inscreption.php?erreur='.$erreur);
                exit;
            }
        }
    }