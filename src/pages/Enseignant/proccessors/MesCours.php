<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class . ".class.php";
    });
    session_start();
    $requite = new Requites();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Mes Cours</title>
    <link
        rel="shortcut icon"
        href="../../../assets/images/logo_icone.png"
        type="image/png"
    >
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="w-full flex h-[2.5rem] items-center">
                    <a href="../Dashbord.php" class="text-2xl h-full font-bold text-blue-600">
                        <img src="../../../assets/images/logo.png" alt="logo du site" class="h-full">
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                        <a href="../Dashbord.php">
                            <button class="flex items-center text-gray-700 hover:text-blue-600">
                                <img src="data:image/png;base64,<?= htmlspecialchars($_SESSION['image'])?>" alt="Etudiant" class="w-8 h-8 rounded-full mr-2">
                                <span><?= htmlspecialchars($_SESSION['username'])?></span>
                            </button>
                        </a>
                        <a href="../../../pages/Authentification/proccessors/desconnecte.php?déconnexion=<?= htmlspecialchars($_SESSION['id_user'])?>" class="text-red-500 px-4 py-2 rounded-lg hover:bg-red-100">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Main Content Container -->
    <div class="flex h-screen  pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md fixed h-full">
            
            <div class="p-6">
                <nav class="space-y-3">
                    <a href="../Dashbord.php" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="./MesCours.php" class="flex items-center text-blue-600 py-2 px-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-book mr-3"></i>
                        <span>Mes cours</span>
                    </a>
                    <a href="./MesEtudiant.php" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span>Étudiants</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex  justify-between items-center w-full px-2">
                    <h2 class="text-2xl font-bold text-gray-800">Mes Cours</h2>
                    <a href="./addCours.php">
                        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Ajouter un nouveau cours
                        </button>
                    </a>
                </div>
            </div>

            <!-- Search and Filter -->
            <div class="flex flex-col md:flex-row gap-4 mb-8">
                <div class="flex-1">
                    <input id="InputSearch" type="search" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                        placeholder="Rechercher un cours...">
                </div>
                <select id="selectCatalogue" class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">Filtrer par catégorie</option>
                    <?php
                        $catalgue = new Catalogues();
                        $data = $requite->selectAll('catalogues');
                        if ($data) {
                            foreach($data as $catalo) {
                                $catalgue->setData('id_catalogue', $catalo['id_catalogue']);
                                $catalgue->setData('catalogue_titre', $catalo['catalogue_titre']);
                                $id = $_GET['idCatalogue'] ?? null;
                                $catalgue->SelectorCatal($id);
                            }
                        }
                    ?>
                </select>
            </div>

            <!-- Course Cards Grid -->
            <div id="CoursesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Course Cards -->
                
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-8">
                <!-- <div class="text-sm text-gray-500">
                    Affichage de 1 à 10 sur 12 cours
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Précédent</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded-lg">1</button>
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Suivant</button>
                </div> -->
            </div>
        </main>
    </div>

    <!-- Footer -->
    <!-- <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
            </div>
        </div>
    </footer> -->

    <script src="../../../assets/js/courEnsei.js"></script>
</body>
</html>
