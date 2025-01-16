<?php
    spl_autoload_register(function($class){
        require "../../../classes/". $class . ".class.php";
    });

    $requite = new Requites();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Ajouter un cours</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
                    <a href="dashboard.html" class="flex items-center text-gray-600 hover:text-blue-600 py-2 px-4 rounded-lg">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="#" class="flex items-center text-blue-600 py-2 px-4 bg-blue-50 rounded-lg">
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
            <!-- Form Container -->
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-xl font-bold text-gray-900">Ajouter un nouveau cours</h1>
                        <a href="dashboard.html" class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>

                    <form action="./crud/insertCours.php" method="POST" class="space-y-6" enctype="multipart/form-data">
                        <!-- Titre du cours -->
                        <div>
                            <label for="cours_titre" class="block text-sm font-medium text-gray-700">Titre du cours *</label>
                            <input type="text" name="cours_titre" id="cours_titre" required placeholder="Titre du cours"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-[1px] focus:border-blue-500 focus:ring-blue-500 p-2">
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                            <textarea name="description" id="description" rows="4" required placeholder="Description"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-[1px] focus:border-blue-500 focus:ring-blue-500 p-2"></textarea>
                        </div>

                        <!-- Image -->
                        <div>
                            <label class="block text-gray-700 mb-2">Image *</label>
                            <input type="file" name="cours_image" multiple accept="image/*" class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Type de contenu -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Type de contenu *</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="content_type" value="video" class="form-radio  text-blue-600" checked>
                                    <span class="ml-2">Vidéo</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="content_type" value="document" class="form-radio text-blue-600">
                                    <span class="ml-2">Document</span>
                                </label>
                            </div>

                            <!-- URL Vidéo -->
                            <div id="video_input" class="space-y-2">
                                <label for="video_url" class="block text-sm font-medium text-gray-700">URL de la vidéo *</label>
                                <input type="url" name="video_url" id="video_url" placeholder="https://youtube.com/..."
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border-[1px] p-2">
                                <p class="text-sm text-gray-500">Collez l'URL YouTube ou Vimeo de votre vidéo</p>
                            </div>

                            <!-- Upload Document -->
                            <div id="document_input" class="hidden space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Document du cours *</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <i class="fas fa-file-upload text-gray-400 text-3xl mb-3"></i>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="document-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                <span>Télécharger un document</span>
                                                <input id="document-upload" name="document" type="file" class="sr-only" accept=".pdf,.doc,.docx">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">PDF, DOC jusqu'à 5MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Catalogue -->
                        <div>
                            <label for="catalogue" class="block text-sm font-medium text-gray-700">Catalogue *</label>
                            <select name="catalogue" id="catalogue" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-[1px] focus:border-blue-500 focus:ring-blue-500 p-2">
                                <option value="">Sélectionnez une catégorie</option>
                                <?php
                                    $catalgue = new Catalogues();
                                    $data = $requite->selectAll('catalogues');
                                    if ($data) {
                                        foreach($data as $catalo) {
                                            $catalgue->setData('id_catalogue', $catalo['id_catalogue']);
                                            $catalgue->setData('catalogue_titre', $catalo['catalogue_titre']);
                                            $id = $_GET['idCatalogue'] ?? null;
                                            $catalgue->SelectorCatal($id);
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Tags -->
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                            <select name="tags[]" id="tags" multiple
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <?php
                                    $tags = new tags();
                                    $data = $requite->selectAll('tags');
                                    if ($data) {
                                        foreach($data as $tag) {
                                            $tags->setData($tag);
                                            $tags->toString();
                                        }
                                    }
                                ?>
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs tags</p>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex justify-end space-x-3 pt-6 border-t">
                            <a href="./MesCours.php">
                                <button type="button"  
                                    class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-50">
                                    Annuler
                                </button>
                            </a>
                            <button type="submit" name="submitCours"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Créer le cours
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle between video and document inputs
        document.querySelectorAll('input[name="content_type"]').forEach((radio) => {
            radio.addEventListener('change', (e) => {
                const videoInput = document.getElementById('video_input');
                const documentInput = document.getElementById('document_input');
                
                if (e.target.value == 'video') {
                    videoInput.classList.remove('hidden');
                    documentInput.classList.add('hidden');
                } else {
                    videoInput.classList.add('hidden');
                    documentInput.classList.remove('hidden');
                }
            });
        });
        

        $(document).ready(function () {
            // Initialize Select2 on the Tags dropdown
            $('#tags').select2({
                placeholder: "Sélectionnez des tags",
                allowClear: true,
                width: '100%'
            });
        });
    </script>

</body>
</html>