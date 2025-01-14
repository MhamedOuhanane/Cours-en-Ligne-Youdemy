<?php
    spl_autoload_register(function($class){
        require "../../../classes/" . $class . ".class.php";
    });

    
    if ($_POST['submitConne']) {
        $ArrayUser = [
            'email' => $_POST['emailConnex'],
            'password' => $_POST['password']
        ];
        $user = new Users($ArrayUser);
        $user->connexion();
    }