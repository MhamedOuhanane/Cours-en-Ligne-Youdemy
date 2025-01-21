<?php

    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class Roles {
        protected $id_role;
        protected $role;

        public function Authan($roleUser = null) {
            $raelpath = realpath(__DIR__.'./src/');
            if ($this->role != $roleUser) {
                if ($this->role == 'Admine') {
                    header("Location: $raelpath/Cours-en-Ligne-Youdemy/src/pages/Admine/Dashbord.php");
                } else if ($this->role == 'Enseignant') {
                    header("Location: $raelpath/Cours-en-Ligne-Youdemy/src/pages/Enseignant/Dashbord.php");
                } else {
                    header("Location: $raelpath/Cours-en-Ligne-Youdemy/src/");
                }      
            }
        }

        public function setData($role) {
            $requite = new Requites();
            $this->role = $role;
            $Array = $requite->selectWhere('roles', 'role', $this->role);
            if ($Array) {
                $this->id_role = $Array['id_role'];
            } else {
                $this->id_role = null;
            }
        }

        public function getData() {
            return [
                'id_role' => $this->id_role,
                'role' => $this->role
            ];
        }


    }