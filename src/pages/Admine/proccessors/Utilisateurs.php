<?php 
    spl_autoload_register(function($class){
        require "./classes/". $class . ".class.php";
    });
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Youdemy</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white fixed h-full">
            <div class="p-6 border-b border-gray-800">
                <h1 class="text-2xl font-bold text-blue-500">Youdemy</h1>
                <p class="text-gray-400">Administration</p>
            </div>
            <nav class="mt-8">
                <a href="../Dashbord.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="./Utilisateurs.php" class="flex items-center px-6 py-3 hover:bg-gray-800 text-blue-500">
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
                    <h2 class="text-2xl font-bold text-gray-800">Tableau de bord</h2>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            <img src="/api/placeholder/32/32" alt="Admin" class="w-8 h-8 rounded-full mr-2">
                            <span class="text-gray-600 mr-2">Admin</span>
                        </div>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-red-400">
                            <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                        </button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Page -->
            <div id="dashboard" class="page">
                
            <!-- Users Page -->
            <div id="users" class="page">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- User Card 1 -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex flex-col items-center mb-4">
                            <img src="data:image/png;base64,<?= htmlspecialchars($_SESSION['image'])?>" alt="User" class="w-36 rounded-full mr-4">
                            <h4 class="font-bold">Thomas Bernard</h4>
                            <p class="text-gray-500 text-sm">thomas.bernard@email.com</p>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Enseignant</span>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="flex-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                <i class="fas fa-pause"></i>
                            </button>
                            <button class="flex-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </div>

                    <!-- User Card 2 -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center mb-4">
                            <img src="data:image/png;base64,<?= htmlspecialchars($_SESSION['image'])?>" alt="User" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-bold">Sophie Martin</h4>
                                <p class="text-gray-500 text-sm">sophie.martin@email.com</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">Étudiant</span>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="flex-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                <i class="fas fa-pause"></i>
                            </button>
                            <button class="flex-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </div>

                    <!-- User Card 3 -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex flex-col items-center mb-4">
                            <img src="/api/placeholder/48/48" alt="User" class="w-30 h-30 rounded-full mr-4 ">
                            <div>
                                <h4 class="font-bold">Pierre Durand</h4>
                                <p class="text-gray-500 text-sm">pierre.durand@email.com</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">Étudiant</span>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="flex-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                <i class="fas fa-pause"></i>
                            </button>
                            <button class="flex-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showPage(pageId) {
            // Cacher toutes les pages
            document.querySelectorAll('.page').forEach(page => {
                page.classList.add('hidden');
            });
            // Afficher la page sélectionnée
            document.getElementById(pageId).classList.remove('hidden');
        }
    </script>
</body>
</html>