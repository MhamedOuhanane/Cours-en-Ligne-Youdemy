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
    <title>Dashboard Admin - Youdemy</title>
    <link
        rel="shortcut icon"
        href="../../../assets/images/logo_icone.png"
        type="image/png"
    >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white fixed h-full">
            <div class="w-full flex h-[4rem] items-center border-r-2 border-black">
                <a href="./" class="text-2xl h-full font-bold text-blue-600">
                    <img src="../../../assets/images/logo.png" alt="logo du site" class="h-full">
                </a>
            </div>
            <div class="p-6 border-b border-gray-800">
                <p class="text-gray-400">Administration</p>
            </div>
            <nav class="mt-8">
                <a href="../Dashbord.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="./Utilisateurs.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-users w-6"></i>
                    <span>Utilisateurs</span>
                </a>
                <a href="./Cours.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-book w-6"></i>
                    <span>Cours</span>
                </a>
                <a href="./Catégories.php" class="flex items-center px-6 py-3 hover:bg-gray-800 text-blue-500">
                    <i class="fas fa-folder w-6"></i>
                    <span>Catégories</span>
                </a>
                <a href="./Tags.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-tags w-6"></i>
                    <span>Tags</span>
                </a>
                <a href="./Enseignants.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-chalkboard-teacher w-6"></i>
                    <span>Enseignants</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 p-8">
            <!-- Header -->
            <header class="bg-white shadow-sm rounded-xl p-4 mb-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Gestion des Catégories</h2>
                    <div class="flex items-center space-x-4">
                        <a href="./pages/Etudiant/Prfil.php">
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
            </header>

            <!-- Content -->
            <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold">Ajout Catégories</h3>
                    <div class="space-x-4">
                        <button onclick="document.getElementById('bulkCategoriesModal').classList.remove('hidden') " 
                                class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                            <i class="fas fa-tags mr-2"></i>Catégories   <i class="fas fa-plus w-6"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Categorie Cards -->
                    <?php
                        $catégories = $requite->selectAll('catalogues');
                        if ($catégories) {
                            foreach($catégories as $catégo) {
                                $catalogue = new Catalogues();
                                $catalogue->setData('id_catalogue', $catégo['id_catalogue']);
                                $catalogue->setData('catalogue_titre', $catégo['catalogue_titre']);
                                $catalogue->setData('catalogue_contenu', $catégo['catalogue_contenu']);
                                $catalogue->setData('catalogue_image', $catégo['catalogue_image']);

                                $catalogue->toString();
                            }
                        }
                    ?>
                </div>
            </div>

            <!-- Bulk Categories Modal -->
            <div id="bulkCategoriesModal" class="<?= (isset($_GET['Modifier'])) ? '':'hidden'?>  fixed bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-4/5 shadow-lg rounded-xl bg-white">
                    <div class="mb-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-bold text-gray-800">Ajout un catégories</h3>
                            <button onclick="closeModal()" 
                                    class="p-2 rounded-full hover:bg-gray-100 transition-all duration-200 text-gray-600 hover:text-gray-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        
                        <form action="processors/ajouteCatégorie.php" method="POST" enctype="multipart/form-data" class="space-y-6 mt-6">
                            <div class="grid gap-6 mb-6">
                                <!-- Titre de la catégorie -->
                                <div>
                                    <label for="catalogue_titre" class="block mb-2 text-sm font-medium text-gray-900">
                                        Titre de la catégorie <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="catalogue_titre" name="catalogue_titre" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Ex: Développement Web" required>
                                </div>

                                <!-- Description de la catégorie -->
                                <div>
                                    <label for="catalogue_contenu" class="block mb-2 text-sm font-medium text-gray-900">
                                        Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="catalogue_contenu" name="catalogue_contenu" rows="4" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                        placeholder="Description de la catégorie..." required></textarea>
                                </div>

                                <!-- Image de la catégorie -->
                                <div>
                                    <label for="catalogue_image" class="block mb-2 text-sm font-medium text-gray-900">
                                        Image <span class="text-red-500">*</span>
                                    </label>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="catalogue_image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Cliquez pour uploader</span> ou glissez-déposez</p>
                                                <p class="text-xs text-gray-500">PNG, JPG ou JPEG</p>
                                            </div>
                                            <input id="catalogue_image" name="catalogue_image" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg" required />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="flex justify-end space-x-4">
                                <button type="button" onclick="closeModal()" 
                                    class="text-gray-500 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                    Annuler
                                </button>
                                <button type="submit" 
                                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                    Ajouter la catégorie
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <script>
        function openModal() {
            document.getElementById('bulkCategoriesModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('bulkCategoriesModal').classList.add('hidden');
        }

        document.querySelector('.bg-yellow-500').onclick = openModal;
    </script>

</body>
</html>