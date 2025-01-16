function filterCours() {
    const searchValue = InputSearch.value;
    const filterCata = selectCatalogue.value;
    const urlfiltre = `./crud/fetchCours.php?CatalogueId=${filterCata}&Search=${searchValue}`;
    console.log(urlfiltre);
    
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
            CoursesGrid.innerHTML += `<div class="CarteCours bg-white rounded-lg shadow-md overflow-hidden">
                                            <div class="relative">
                                                <img src="data:image/pnp;base64,${element['imageCours']}" alt="Course" class="w-full h-48 object-cover">
                                                <span class="absolute top-4 right-4 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                    Publié
                                                </span>
                                            </div>
                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold mb-2 min-h-14">${element['cours_titre']}</h3>
                                                <p class="text-gray-600 text-sm mb-4">${element['description']}</p>
                                                <p class="text-gray-600 text-sm mb-4">${element['catalogue_titre']}</p>
                                                <div class="flex items-center justify-between mb-4">
                                                    <span class="text-sm text-gray-500">
                                                        <i class="fas fa-users mr-2"></i>
                                                        ${element['etudiants']}
                                                    </span>
                                                    <span class="text-sm text-gray-500">
                                                        <i class="fas fa-clock mr-2"></i>
                                                        ${element['createDate']}
                                                    </span>
                                                </div>
                                                <div class="flex justify-end space-x-4">
                                                    <a href="./addCours.php?Modify=${element['id_cour']}">
                                                        <button class="text-blue-600 hover:bg-blue-50 rounded-lg">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button data-delete="${element['id_cour']}" class="text-red-600 hover:bg-red-50 rounded-lg">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>`;
            // let continaire = document.querySelector(`#contTags${element['id_cour']}`);
            // continaire = '';
            // params.forEach(elem => {
            //     if (id_cours == elem['id_cours']) {
            //         continaire += `<span class="bg-purple-100 text-gray-600 text-sm px-3 py-1 rounded-full">${elem['tag_Titre']}</span>`;
            //     }
            // });

        }
    });
}

let searchTime;
InputSearch.addEventListener('input', () => {
    clearTimeout(searchTime);
    searchTime = setTimeout(filterCours, 150);
});


selectCatalogue.addEventListener('change', filterCours);

document.addEventListener('DOMContentLoaded', filterCours);