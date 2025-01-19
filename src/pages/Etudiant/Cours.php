<?php
    spl_autoload_register(function($class){
        require "../../classes/". $class . ".class.php";
    });
    session_start();

    $requite = new Requites();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Cours</title>
    <link
        rel="shortcut icon"
        href="../../assets/images/logo_icone.png"
        type="image/png"
    >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/input.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="bg-white h-[4rem] shadow-md">
        <div class="container h-full mx-auto px-6 py-3">
            <div class="flex h-full items-center justify-between">
                <div class="flex h-full items-center">
                    <a href="../../index.php" class="text-2xl h-full font-bold text-blue-600">
                        <img src="../../assets/images/logo.png" alt="logo du site" class="h-full">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="../../index.php" class="text-gray-600 hover:text-blue-600 ">Home</a>
                    <a href="Cours.php" class="text-blue-600">Cours</a>
                    <a href="Profil.php" class="text-gray-600 hover:text-blue-600">Profil</a>
                </div>
                <?php if (isset($_SESSION['id_user'])) {?>
                    <div class="flex items-center space-x-4">
                        <a href="./pages/Etudiant/Prfil.php">
                            <button class="flex items-center text-gray-700 hover:text-blue-600">
                                <img src="data:image/png;base64,<?= htmlspecialchars($_SESSION['image'])?>" alt="Etudiant" class="w-8 h-8 rounded-full mr-2">
                                <span><?= htmlspecialchars($_SESSION['username'])?></span>
                            </button>
                        </a>
                        <a href="./pages/Authentification/proccessors/desconnecte.php?déconnexion=<?= htmlspecialchars($_SESSION['id_user'])?>" class="text-red-500 px-4 py-2 rounded-lg hover:bg-red-100">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="flex items-center space-x-4">
                        <a href="./pages/Authentification/connexion.php" class="text-gray-600 hover:text-blue-600">Se connecter</a>
                        <a href="./pages/Authentification/inscription.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">S'inscrire</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row gap-4 justify-between mb-8">
            <div class="relative flex-1">
                <input id="InputSearch" type="search" 
                    class="w-full pl-10 pr-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500" 
                    placeholder="Rechercher un cours...">
                <div class="absolute left-3 top-3.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="flex gap-4">
                <select id="selectCatalogue" class="px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">Filtrer par catalogue</option>
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
                <select id="selectTags" class="px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">Filtrer par tag</option>
                    <?php
                        $tags = new tags();
                        $data = $requite->selectAll('tags');
                        if ($data) {
                            foreach($data as $tag) {
                                $tags->setData($tag);
                                $tags->toString();
                            }
                        }
                    ?>
                </select>
            </div>
        </div>

        <!-- Courses Grid -->
        <div id="CoursesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Courses Cards -->
            
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2 mt-12">
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-100 disabled:opacity-50" disabled>
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">1</button>
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">2</button>
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">3</button>
            <span class="px-4 py-2">...</span>
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">10</button>
            <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">À propos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Qui sommes-nous</a></li>
                        <li><a href="#" class="hover:text-blue-400">Carrières</a></li>
                        <li><a href="#" class="hover:text-blue-400">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ressources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Centre d'aide</a></li>
                        <li><a href="#" class="hover:text-blue-400">Devenir formateur</a></li>
                        <li><a href="#" class="hover:text-blue-400">Affiliations</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Légal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Conditions d'utilisation</a></li>
                        <li><a href="#" class="hover:text-blue-400">Politique de confidentialité</a></li>
                        <li><a href="#" class="hover:text-blue-400">Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-blue-400"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-blue-400"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="hover:text-blue-400"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="../../assets/js/coursEtud.js"></script>
</body>
</html>