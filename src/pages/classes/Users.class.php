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


        private function __construct($username, $email, $ville, $telephone, $image, $password, $status, $role)
        {
            $this->username = $username;
            $this->email = $email;
            $this->ville = $ville;
            $this->telephone = $telephone;
            $this->image = $image;
            $this->password = $password;
            $this->status = $status;
            $this->role = $role;
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
                
                $result = $requite->insertData('user', $utilisateur);
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