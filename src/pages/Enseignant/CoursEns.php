<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Tableau de bord Enseignant</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-10">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600">Youdemy</a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center text-gray-700 hover:text-blue-600">
                            <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full mr-2">
                            <span>Prof. John Doe</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Main Content Container -->
    <div class="flex h-screen pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md fixed h-full">
            <div class="p-6">
                <nav class="space-y-3">
                    <a href="#dashboard" class="flex items-center text-blue-600 py-2 px-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="./proccessors/mesCours.php" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-book mr-3"></i>
                        <span>Mes cours</span>
                    </a>
                    <a href="#stats" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span>Statistiques</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Total Cours</p>
                            <h3 class="text-2xl font-bold">12</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-book text-blue-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Total Étudiants</p>
                            <h3 class="text-2xl font-bold">256</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-users text-green-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Taux de Complétion</p>
                            <h3 class="text-2xl font-bold">75%</h3>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-chart-pie text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add New Course Button -->
            <div class="mb-8">
                <a href="./proccessors/addCours.php">
                    <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter un nouveau cours
                    </button>
                </a>
            </div>

            <!-- Course Management -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Gestion des cours</h2>
                    <!-- Search and Filter -->
                    <div class="flex flex-col md:flex-row gap-4 mb-6">
                        <div class="flex-1">
                            <input type="search" 
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                placeholder="Rechercher un cours...">
                        </div>
                        <select class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">Filtrer par catégorie</option>
                            <option value="web">Développement Web</option>
                            <option value="mobile">Développement Mobile</option>
                            <option value="data">Data Science</option>
                        </select>
                    </div>

                    <!-- Courses Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cours
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Étudiants
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/40/40" alt="Course" class="w-10 h-10 rounded-lg mr-3">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Introduction au développement web</div>
                                                <div class="text-sm text-gray-500">Développement Web</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">45 étudiants</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publié
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <button class="text-blue-600 hover:text-blue-900">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button class="text-gray-600 hover:text-gray-900">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Additional course rows would go here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-500">
                            Affichage de 1 à 10 sur 12 cours
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Précédent</button>
                            <button class="px-3 py-1 bg-blue-600 text-white rounded-lg">1</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>