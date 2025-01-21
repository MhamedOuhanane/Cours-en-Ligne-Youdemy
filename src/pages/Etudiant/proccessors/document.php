<?php
spl_autoload_register(function($class){
    require "../../../classes/". $class .".class.php";
});
if (isset($_GET['id'])) {
    $requite = new Requites();
    $cours = $requite->selectWhere('cours', 'id_cour', $_GET['id']);
    if ($cours['cours_contenu'] != null) {
        $document = $cours['cours_contenu'];
        header('Content-Type: application/pdf');
        header('Content-Length: ' . strlen($document));
        echo $document;
        exit;
    }
}
?>