<?php
    spl_autoload_register(function($class){
        require $class . ".classe.php";
    });

    class Etudiants extends Users {
        function toStringUser()
        {
            echo ``;
        }
    }