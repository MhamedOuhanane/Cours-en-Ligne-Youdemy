<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Gestion des Étudiants</title>
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
                    <a href="./dashboard.php" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="./mesCours.php" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-book mr-3"></i>
                        <span>Mes cours</span>
                    </a>
                    <a href="#" class="flex items-center text-blue-600 py-2 px-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-users mr-3"></i>
                        <span>Étudiants</span>
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
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Gestion des Étudiants</h1>
                <!-- Stats Cards -->
                <div class="flex space-x-4">
                    <div class="bg-white px-6 py-3 rounded-lg shadow-sm">
                        <span class="text-sm text-gray-500">Total Étudiants</span>
                        <p class="text-xl font-bold">256</p>
                    </div>
                    <div class="bg-white px-6 py-3 rounded-lg shadow-sm">
                        <span class="text-sm text-gray-500">Actifs ce mois</span>
                        <p class="text-xl font-bold">180</p>
                    </div>
                </div>
            </div>

            <!-- Search and Filter -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="search" 
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Rechercher un étudiant...">
                    </div>
                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="">Filtrer par cours</option>
                        <option value="web">Introduction au développement web</option>
                        <option value="mobile">Développement Mobile</option>
                        <option value="data">Data Science</option>
                    </select>
                    <select class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="">Statut</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
            </div>

            <!-- Students List -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Étudiant
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cours Suivis
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Progression
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dernière Activité
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Student Row 1 -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/40/40" alt="Student" class="w-10 h-10 rounded-full mr-3">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Alice Martin</div>
                                                <div class="text-sm text-gray-500">alice.martin@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">Introduction au développement web</div>
                                        <div class="text-sm text-gray-500">Développement Mobile</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-1 h-2 bg-gray-200 rounded-full mr-2">
                                                <div class="h-2 bg-green-500 rounded-full" style="width: 75%"></div>
                                            </div>
                                            <span class="text-sm text-gray-600">75%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Il y a 2 jours</div>
                                        <div class="text-xs text-gray-500">12 Jan 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <button class="text-blue-600 hover:text-blue-900">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                            <button class="text-gray-600 hover:text-gray-900">
                                                <i class="fas fa-chart-line"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Student Row 2 -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="/api/placeholder/40/40" alt="Student" class="w-10 h-10 rounded-full mr-3">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Thomas Bernard</div>
                                                <div class="text-sm text-gray-500">thomas.b@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">Data Science</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-1 h-2 bg-gray-200 rounded-full mr-2">
                                                <div class="h-2 bg-green-500 rounded-full" style="width: 45%"></div>
                                            </div>
                                            <span class="text-sm text-gray-600">45%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Aujourd'hui</div>
                                        <div class="text-xs text-gray-500">14 Jan 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <button class="text-blue-600 hover:text-blue-900">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                            <button class="text-gray-600 hover:text-gray-900">
                                                <i class="fas fa-chart-line"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-500">
                            Affichage de 1 à 10 sur 256 étudiants
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Précédent</button>
                            <button class="px-3 py-1 bg-blue-600 text-white rounded-lg">1</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-50">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>