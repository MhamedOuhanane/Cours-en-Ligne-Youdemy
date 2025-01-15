<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class .".class.php";
    });

    $requite = new Requites();
    $Cours = $requite->fetchData('listecours', null, null, null);
    var_dump($Cours);