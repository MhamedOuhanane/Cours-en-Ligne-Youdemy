<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class . ".class.php";
    });
    session_start();
    $requite = new Requites();
    $tags = new tags();
    
    
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
                <a href="./Catégories.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-folder w-6"></i>
                    <span>Catégories</span>
                </a>
                <a href="./Tags.php" class="flex items-center px-6 py-3 hover:bg-gray-800 text-blue-500">
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
                    <h2 class="text-2xl font-bold text-gray-800">Gestion des Tags</h2>
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
                <!-- Actions Buttons -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold">Ajout Tags</h3>
                    <div class="flex gap-4">
                        <button onclick="document.getElementById('tagsModal').classList.remove('hidden')" 
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            <i class="fas fa-tags mr-2"></i>Gérer les Tags<i class="fas fa-plus ml-2"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4   gap-6">
                    <!-- Tags Cards -->
                    <?php
                        $listeTags = $requite->selectAll('tags');
                        if ($listeTags) {
                            foreach ($listeTags as $value) {
                                $tags->setData($value);
                                $tags->toStringDash();
                            }
                        }
                    ?>
                </div>
            </div>

            
            <!-- Tags Modal -->
            <div id="tagsModal" class="<?= (isset($_GET['Modifier'])) ? '' : 'hidden' ?> fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Gestion des Tags</h3>
                        <a href="<?= (isset($_GET['Modifier'])) ? './Tags.php' : '' ?>">
                            <button onclick="document.getElementById('tagsModal').classList.add('hidden'); tagsForm.reset()" 
                                    class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </a>
                    </div>

                    <?php
                        if (isset($_GET['Modifier'])) {
                            $tag = $requite->selectWhere('tags', 'id_tag', $_GET['Modifier']);
                            if ($tag != null) {
                                $tags->setData($tag);
                            }
                        }
                    ?>

                    <form id="tagsForm" action="./crud/addTags.php <?= (isset($_GET['Modifier'])) ? '?idTag='.$_GET['Modifier'] : '' ?>" method="POST" class="space-y-4">
                        <div id="tagInputs">
                            <div class="mb-4">
                                <input type="text" name="tags[]" placeholder="Nouveau tag" 
                                    value="<?= (isset($_GET['Modifier'])) ? $tags->getData()[1] : '' ?>"
                                    class="w-full px-4 py-2 border rounded-lg">
                            </div>
                        </div>
                    <?php if (!isset($_GET['Modifier'])) { ?>
                        <button type="button" onclick="addTagInput()" 
                                class="w-full text-blue-500 border border-blue-500 px-4 py-2 rounded-lg hover:bg-blue-50">
                            <i class="fas fa-plus mr-2"></i>Ajouter un autre tag
                        </button>
                        <button type="submit" name="submitTags" 
                                class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Enregistrer les tags
                        </button>
                    <?php } else { ?>
                        <button type="submit" name="submitModifTags" 
                                class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                            Modifier
                        </button>
                    <?php } ?>
                    
                    </form>
                </div>
            </div>
            
        </main>
    </div>

    <script>
        function addTagInput() {
            const container = document.getElementById('tagInputs');
            const newInput = document.createElement('div');
            newInput.className = 'mb-4';
            newInput.innerHTML = `
                <div class="flex gap-2">
                    <input type="text" name="tags[]" placeholder="Nouveau tag" 
                        class="flex-1 px-4 py-2 border rounded-lg">
                    <button type="button" onclick="this.parentElement.remove()" 
                            class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(newInput);
        }
    </script>
</body>
</html>