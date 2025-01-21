<?php 
    spl_autoload_register(function($class){
        require "../../../classes/". $class . ".class.php";
    });
    session_start();
    $role = $_SESSION['role'] ?? null;
    $roles = new Roles();
    $roles->setData($role);
    $roles->Authan("Admine");

    $requite = new Requites();
    $role = new Roles();
    $role->setData('Enseignant');
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
                <a href="./Tags.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-tags w-6"></i>
                    <span>Tags</span>
                </a>
                <a href="./Enseignants.php" class="flex items-center px-6 py-3 hover:bg-gray-800  text-blue-500">
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
                    <h2 class="text-2xl font-bold text-gray-800">Enseignants</h2>
                    <div class="flex items-center space-x-4">
                        <a href="../Dashbord.php">
                            <button class="flex items-center text-gray-700 hover:text-blue-600">
                                <img src="data:image/png;base64,<?= htmlspecialchars($_SESSION['image'])?>" alt="Admine" class="w-8 h-8 rounded-full mr-2">
                                <span><?= htmlspecialchars($_SESSION['username'])?></span>
                            </button>
                        </a>
                        <a href="../../../pages/Authentification/proccessors/desconnecte.php?déconnexion=<?= htmlspecialchars($_SESSION['id_user'])?>" class="text-red-500 px-4 py-2 rounded-lg hover:bg-red-100">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Enseignants Page -->
            <div id="Enseignants" class="page">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- les cartes des Enseignants -->
                    <?php
                        $usersEn = $requite->selectAll('users', 'id_role', $role->getData()['id_role']);
                        if ($usersEn != []) {
                            foreach($usersEn as $enseign) {
                                $Enseignant = new Enseignants($enseign);
                                $Enseignant->toStringUser();
                            }
                        }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <script src="../../../assets/js/enseiDash.js"></script>
</body>
</html>