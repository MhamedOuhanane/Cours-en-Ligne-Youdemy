<?php

    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class Roles {
        protected $id_role;
        protected $role;

        // private function __construct($url) {
            
        //     $current_url = $_SERVER['REQUEST_URI'];
        //     $source_index = '/Cours-en-Ligne-Youdemy/src/';

        //     if (($current_url != $source_index) && ($current_url != $source_index . 'index.php')) {
        //         header("Location: $source_index");
        //     } else {
        //         if ($role != null) {
        //             if ($role == 'Admine') {
        //                 # code...
        //             } if (condition) {
        //                 # code...
        //             } else {
        //                 # code...
        //             }
                    
        //         }
        //     }
        // }

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