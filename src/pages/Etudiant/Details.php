<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Détails du cours</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-2xl font-bold text-blue-600">Youdemy</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600">
                        <i class="fas fa-arrow-left mr-2"></i>Retour aux cours
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Course Header -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-2/3">
                    <div class="flex gap-2 mb-4">
                        <span class="bg-blue-500 bg-opacity-25 text-white px-3 py-1 rounded-full text-sm">Web Dev</span>
                        <span class="bg-blue-500 bg-opacity-25 text-white px-3 py-1 rounded-full text-sm">Frontend</span>
                        <span class="bg-blue-500 bg-opacity-25 text-white px-3 py-1 rounded-full text-sm">Débutant</span>
                    </div>
                    <h1 class="text-4xl font-bold mb-4">Introduction au développement web</h1>
                    <p class="text-xl mb-6">Apprenez les bases du développement web avec HTML, CSS et JavaScript.</p>
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/48/48" alt="Author" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <p class="font-semibold">John Doe</p>
                            <p class="text-sm">Expert en développement web</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/3 bg-white bg-opacity-10 rounded-lg p-6">
                    <div class="text-center mb-6">
                        <p class="text-lg mb-2">ID du cours: #12345</p>
                        <p class="text-sm">Créé le 15 Jan 2025</p>
                        <p class="text-sm">Dernière mise à jour: 20 Jan 2025</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <button class="w-full bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                            Commencer le cours
                        </button>
                        <button class="w-full border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600">
                            Ajouter aux favoris
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Content -->
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="md:col-span-2">
                <!-- About Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4">À propos de ce cours</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p class="text-gray-600 mb-4">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>

                <!-- Course Content Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Contenu du cours</h2>
                    <div class="space-y-4">
                        <!-- Section 1 -->
                        <div class="border rounded-lg">
                            <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50">
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-down mr-4 text-gray-500"></i>
                                    <div>
                                        <h3 class="font-semibold">1. Introduction</h3>
                                        <p class="text-sm text-gray-500">3 leçons • 45 minutes</p>
                                    </div>
                                </div>
                                <span class="text-blue-600">Commencer</span>
                            </div>
                        </div>

                        <!-- Section 2 -->
                        <div class="border rounded-lg">
                            <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50">
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-right mr-4 text-gray-500"></i>
                                    <div>
                                        <h3 class="font-semibold">2. Les bases de HTML</h3>
                                        <p class="text-sm text-gray-500">5 leçons • 1h15</p>
                                    </div>
                                </div>
                                <span class="text-gray-500">Verrouillé</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirements Section -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold mb-4">Prérequis</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Aucune expérience en programmation requise</li>
                        <li>Un ordinateur avec accès à internet</li>
                        <li>Un éditeur de texte basique</li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="md:col-span-1">
                <!-- Course Info Card -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold mb-4">Informations du cours</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-clock w-6 text-gray-500"></i>
                            <span class="ml-2">10 heures de contenu</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-video w-6 text-gray-500"></i>
                            <span class="ml-2">42 leçons</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-graduation-cap w-6 text-gray-500"></i>
                            <span class="ml-2">Certificat de réussite</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-globe w-6 text-gray-500"></i>
                            <span class="ml-2">Français</span>
                        </div>
                    </div>
                </div>

                <!-- Category Info -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4">Catégorie</h3>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-folder-open mr-2"></i>
                        <span>Développement Web</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>