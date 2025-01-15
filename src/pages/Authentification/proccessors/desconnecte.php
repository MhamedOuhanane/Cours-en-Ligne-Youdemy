<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class . ".class.php";
    });
    session_start();

    $req = new Requites();
    $image1 = file_get_contents('../../../assets/images/web.jpg');
    $image2 = file_get_contents('../../../assets/images/tarifs-marketing-digital-freelance.jpg');
    $image3 = file_get_contents('../../../assets/images/0x0.webp');
    $image4 = file_get_contents('../../../assets/images/images.jpg');
    $image5 = file_get_contents('../../../assets/images/1713196475013.jpg');
    
    if (isset($_GET['déconnexion']) && isset($_SESSION['id_user']) && ($_GET['déconnexion'] == $_SESSION['id_user'])) {
        session_reset();
        session_destroy();
        header('Location: ../../../');
    }