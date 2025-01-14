<?php
    spl_autoload_register(function($class){
        require "../../classes/" . $class . ".class.php";
    });

    if (isset($_POST['submitInscr'])) {
        if ($_POST['']) {
            # code...
        }
    }