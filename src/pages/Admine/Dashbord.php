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
            <div class="w-full bg-white flex h-[4rem] items-center border-r-2 border-black">
                <a href="./" class="text-2xl h-full font-bold text-blue-600">
                    <img src="../../assets/images/logo.png" alt="logo du site" class="h-full">
                </a>
            </div>
            <div class="p-6 border-b border-gray-800">
                <p class="text-gray-400">Administration</p>
            </div>
            <nav class="mt-8">
                <a href="Dashbord.php" class="flex items-center px-6 py-3 hover:bg-gray-800 text-blue-500">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="./proccessors/Utilisateurs.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-users w-6"></i>
                    <span>Utilisateurs</span>
                </a>
                <a href="./proccessors/Cours.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-book w-6"></i>
                    <span>Cours</span>
                </a>
                <a href="./proccessors/Catégories.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-folder w-6"></i>
                    <span>Catégories</span>
                </a>
                <a href="./proccessors/Tags.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
                    <i class="fas fa-tags w-6"></i>
                    <span>Tags</span>
                </a>
                <a href="./proccessors/Enseignants.php" class="flex items-center px-6 py-3 hover:bg-gray-800">
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
                    <div class="flex items-center space-x-4">
                        <a href="./pages/Etudiant/Prfil.php">
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
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="fas fa-users text-blue-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Total Utilisateurs</h4>
                            <span class="text-2xl font-bold">1,234</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="fas fa-book text-green-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Total Cours</h4>
                            <span class="text-2xl font-bold">156</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <i class="fas fa-chalkboard-teacher text-purple-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Enseignants</h4>
                            <span class="text-2xl font-bold">45</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full">
                            <i class="fas fa-star text-yellow-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-gray-500">Note Moyenne</h4>
                            <span class="text-2xl font-bold">4.5</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Évolution des Inscriptions</h3>
                    <canvas id="enrollmentsChart" height="200"></canvas>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Répartition des Cours</h3>
                    <canvas id="coursesChart" height="200"></canvas>
                </div>
            </div>

            <!-- Recent Activities with Top Teachers -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Top 3 Enseignants</h3>
                    <div class="space-y-4">
                        <div class="flex items-center py-3 border-b">
                            <div class="p-3 bg-yellow-100 rounded-full mr-4">
                                <i class="fas fa-trophy text-yellow-500"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Sarah Martin</p>
                                <p class="text-sm text-gray-500">Développement Web - 4.9★ (156 avis)</p>
                            </div>
                            <span class="text-green-500 font-bold">1er</span>
                        </div>
                        <div class="flex items-center py-3 border-b">
                            <div class="p-3 bg-gray-100 rounded-full mr-4">
                                <i class="fas fa-medal text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Jean Dubois</p>
                                <p class="text-sm text-gray-500">Design UX/UI - 4.8★ (132 avis)</p>
                            </div>
                            <span class="text-blue-500 font-bold">2ème</span>
                        </div>
                        <div class="flex items-center py-3">
                            <div class="p-3 bg-orange-100 rounded-full mr-4">
                                <i class="fas fa-award text-orange-500"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Marie Laurent</p>
                                <p class="text-sm text-gray-500">Marketing Digital - 4.7★ (98 avis)</p>
                            </div>
                            <span class="text-orange-500 font-bold">3ème</span>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script>
        // Configuration des graphiques
        const enrollmentsCtx = document.getElementById('enrollmentsChart').getContext('2d');
        const coursesCtx = document.getElementById('coursesChart').getContext('2d');

        // Graphique des inscriptions
        new Chart(enrollmentsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Inscriptions',
                    data: [65, 85, 110, 95, 130, 150],
                    borderColor: '#3B82F6',
                    tension: 0.3,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique des cours
        new Chart(coursesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Développement', 'Design', 'Marketing', 'Business'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#6366F1'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>