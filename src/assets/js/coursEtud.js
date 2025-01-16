function filterCours() {
    const searchValue = InputSearch.value;
    const filterValue = selectTags.value;
    const urlfiltre = `./proccessors/fetchCours.php?tagId=${filterValue}&Search=${searchValue}`;

    fetch(urlfiltre)
    .then(response => response.json())
    .then(data => {
        
            AfficherVéhicules(data);
            
        })
        .catch(error => {
            CoursesGrid.innerHTML = `<div class="col-span-full text-center text-red-500">
                                        <span>ERREUR : ${error.message}</span>
                                    </div>`;
        });
}

function AfficherVéhicules(params) {
    if (params.length == 0) {
        CoursesGrid.innerHTML = `<div class="col-span-full text-center text-red-500">
                                    <span>Aucun Cours trouvé</span>
                                </div>`;  
        return;          
    }

    CoursesGrid.innerHTML = '';
    let id_cours = null;

    params.forEach(element => {
        if (id_cours == null || id_cours != element['id_cours']) {
            id_cours = element['id_cours'];
            CoursesGrid.innerHTML += `<div class="bg-white rounded-lg shadow-md overflow-hidden">
                                        <img src="data:image/png;base64,${element['imageCours']}" alt="Course ${element['id_cour']}" class="w-full h-48 object-cover">
                                        <div class="p-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <span class="text-sm text-gray-500">#ID: ${element['id_cour']}</span>
                                                <div id="contTags${element['id_cour']}" class="flex self-end flex-wrap gap-2">
                                                </div>
                                            </div>
                                            <h3 class="text-xl font-semibold mb-2">${element['catalogue_titre']}</h3>
                                            <p class="text-gray-600 mb-4 line-clamp-2">${element['description']}</p>
                                            <div class="flex items-center mb-4">
                                                <img src="data:image/png;base64,${element['image']}" alt="Author" class="w-8 h-8 rounded-full mr-3">
                                                <div>
                                                    <p class="text-sm font-semibold">${element['username']}</p>
                                                    <p class="text-xs text-gray-500">${element['createDate']}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="text-sm text-gray-500">
                                                    <i class="fas fa-folder-open mr-2"></i>
                                                    ${element['catalogue_titre']}</span>
                                                </div>
                                                <a href="./Details.php?idCours=${element['id_cour']}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Voir le cours</a>
                                            </div>
                                        </div>
                                    </div>`;
            let continaire = document.querySelector(`#contTags${element['id_cour']}`);
            continaire = '';
            params.forEach(elem => {
                if (id_cours == element['id_cours']) {
                    continaire += `<span class="bg-purple-100 text-purple-600 text-sm px-3 py-1 rounded-full">${element['tag_Titre']}</span>`;
                }
            });

        }
    });
}

let searchTime;
InputSearch.addEventListener('input', () => {
    clearTimeout(searchTime);
    searchTime = setTimeout(filterCours, 150);
});


selectTags.addEventListener('change', filterCours);

document.addEventListener('DOMContentLoaded', filterCours);