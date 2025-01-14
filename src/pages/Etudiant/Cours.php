<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Cours</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="../../" class="text-2xl font-bold text-blue-600">Youdemy</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="../../" class="text-gray-600 hover:text-blue-600">Home</a>
                    <a href="Cours.php" class="text-blue-600">Cours</a>
                    <a href="Profil.php" class="text-gray-600 hover:text-blue-600">Profil</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="../Authentification/connexion.php" class="text-gray-600 hover:text-blue-600">Se connecter</a>
                    <a href="../../pages/Authentification/inscription.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row gap-4 justify-between mb-8">
            <div class="relative flex-1">
                <input type="search" 
                    class="w-full pl-10 pr-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500" 
                    placeholder="Rechercher un cours...">
                <div class="absolute left-3 top-3.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="flex gap-4">
                <select class="px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">Filtrer par catalogue</option>
                    <option value="dev">Développement</option>
                    <option value="marketing">Marketing</option>
                    <option value="data">Data Science</option>
                </select>
                <select class="px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">Filtrer par tag</option>
                    <option value="debutant">Débutant</option>
                    <option value="intermediaire">Intermédiaire</option>
                    <option value="avance">Avancé</option>
                </select>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Course Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/api/placeholder/400/200" alt="Course" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-500">#ID: 12345</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Web Dev</span>
                            <span class="bg-green-100 text-green-600 text-sm px-3 py-1 rounded-full">Frontend</span>
                            <span class="bg-purple-100 text-purple-600 text-sm px-3 py-1 rounded-full">Débutant</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Introduction au développement web</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">Apprenez les bases du développement web avec HTML, CSS et JavaScript.</p>
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/32/32" alt="Author" class="w-8 h-8 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-semibold">John Doe</p>
                            <p class="text-xs text-gray-500">Créé le 15 Jan 2025</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-folder-open mr-2"></i>
                            <span>Développement Web</span>
                        </div>
                        <a href="./Details.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Voir le cours</a>
                    </div>
                </div>
            </div>

            <!-- Additional Course Cards (Similar Structure) -->
            <!-- Repeat the card structure for more courses -->
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
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>