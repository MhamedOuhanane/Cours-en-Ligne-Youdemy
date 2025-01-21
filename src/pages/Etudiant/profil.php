<?php
    spl_autoload_register(function($class){
        require "../../classes/". $class . ".class.php";
    });
    session_start();
    $role = $_SESSION['role'] ?? null;
    $roles = new Roles();
    $roles->setData($role);
    $roles->Authan("Etudiant");
    
    $requite = new Requites();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Détails du cours</title>
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
    <nav class="bg-white h-[4rem] shadow-md">
        <div class="container h-full mx-auto px-6 py-3">
            <div class="flex h-full items-center justify-between">
                <div class="flex h-full items-center">
                    <a href="../../index.php" class="text-2xl h-full font-bold text-blue-600">
                        <img src="../../assets/images/logo.png" alt="logo du site" class="h-full">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="../../index.php" class="text-gray-600 hover:text-blue-600">Home</a>
                    <a href="./Cours.php" class="text-gray-600 hover:text-blue-600">Cours</a>
                    <a href="./Profil.php" class="text-blue-600">Profil</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="./profil.php">
                        <button class="flex items-center text-gray-700 hover:text-blue-600">
                            <img src="data:image/png;base64,<?= htmlspecialchars($_SESSION['image'])?>" alt="Etudiant" class="w-8 h-8 rounded-full mr-2">
                            <span><?= htmlspecialchars($_SESSION['username'])?></span>
                        </button>
                    </a>
                    <a href="../../pages/Authentification/proccessors/desconnecte.php?déconnexion=<?= htmlspecialchars($_SESSION['id_user'])?>" class="text-red-500 px-4 py-2 rounded-lg hover:bg-red-100">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="pt-16 pb-12">
        <!-- En-tête du profil -->
        <div class="bg-white shadow-md mb-6 ">
            <div class="max-w-7xl mx-auto p-6 ">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="w-32 h-32 rounded-full overflow-hidden">
                        <img src="<?= "data:image/png;base64,".$_SESSION['image']?>" alt="Photo de profil de <?= $_SESSION['username']; ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-2xl font-bold mb-2"><?= $_SESSION['username']; ?></h1>
                        <p class="text-gray-600 mb-4">Etudiant</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-blue-500"></i>
                                <span><?= $_SESSION['ville']; ?>, Maroc</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-phone text-blue-500"></i>
                                <span><?= $_SESSION['telephone']; ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-envelope text-blue-500"></i>
                                <span><?= $_SESSION['email']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onglets -->
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-6 border-b">
                <div class="flex flex-wrap -mb-px">
                    <a href="profil.php?#">
                        <button class="inline-flex items-center h-12 px-4 py-2 text-sm font-medium leading-5 <?= (empty($_GET))? 'text-blue-500 border-bltext-blue-500 border-b-2' : 'text-gray-500 hover:text-blue-500' ?> focus:outline-none">
                            <i class="fas fa-user mr-2"></i>
                            Profile
                        </button>
                    </a>
                    <a href="?MesCours">
                        <button class="inline-flex items-center h-12 px-4 py-2 text-sm font-medium leading-5 <?= (isset($_GET['MesCours']))? 'text-blue-500 border-bltext-blue-500 border-b-2' : 'text-gray-500 hover:text-blue-500' ?> focus:outline-none">
                            <i class="fas fa-newspaper mr-2"></i>
                            Mes Cours
                        </button>
                    </a>
                </div>
            </div>

            <!-- Contenu des onglets -->
            
            <!-- Profile -->
            <?php if (empty($_GET)) { ?>
                <div id="Profile" class="tab-content">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Information Personnelle</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 border-b-2">Nom Complet</label>
                                <p class="text-gray-600"><?= $_SESSION['username']; ?></p>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 border-b-2">Email</label>
                                <p class="text-gray-600"><?= $_SESSION['email']; ?></p>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 border-b-2">Téléphone</label>
                                <p class="text-gray-600"><?= $_SESSION['telephone']; ?></p>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2 border-b-2">Ville</label>
                                <p class="text-gray-600"><?= $_SESSION['ville']; ?></p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-500">
                                <i class="fas fa-edit mr-2"></i>Modifier le profil
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Mes cours -->
            <?php if (isset($_GET['MesCours'])) {?>
                <div id="Articles" class="tab-content ">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Mes Cours</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <?php
                                $listeMesCours = $requite->selectAll('listeinscriptioncours', 'email', $_SESSION['email'], 'cours', 'id_cour');
                                
                                if ($listeMesCours) {
                                    foreach ($listeMesCours as $value) {
                                        $cours = new Cours($value);
                                        $cours->toStringMesCours($value['id_user']);
                                    }
                                } else {
                                    echo '<p class="text-gray-600">Aucun inscription des cours.</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    <!-- Footer -->
    

    <script>
        function showTab(tabId) {
            // Cacher tous les contenus des onglets
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            
            // Afficher le contenu de l'onglet sélectionné
            document.getElementById(tabId).classList.remove('hidden');
            
            // Mettre à jour les styles des boutons
            document.querySelectorAll('button').forEach(button => {
                button.classList.remove('text-blue-500', 'border-b-2', 'border-bltext-blue-500');
                button.classList.add('text-gray-500');
            });
            
            // Mettre en surbrillance le bouton actif
            event.currentTarget.classList.remove('text-gray-500');
            event.currentTarget.classList.add('text-blue-500', 'border-b-2', 'border-bltext-blue-500');
        }
    </script>
</body>
</html>