function filterEtudiant() {
    const searchValue = InputSearch.value;
    const filterCata = selectCatalogue.value;
    const urlfiltre = `./proccessors/fetchCours.php?CatalogueId=${filterCata}&Search=${searchValue}`;
    fetch(urlfiltre)
    .then(response => response.json())
    .then(data => {
        
            AfficherEtudiant(data);
            
        })
        .catch(error => {
            EtudiantRow.innerHTML = `<div class="col-span-full text-center text-red-500">
                                        <span>ERREUR : ${error.message}</span>
                                    </div>`;
        });
}

function AfficherEtudiant(params) {
    if (params.length == 0) {
        EtudiantRow.innerHTML = `<tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="col-span-full text-center text-red-500">
                                            <span>Aucun Etudiant inscrer</span>
                                        </div>
                                    </td>
                                </tr>`;  
        return;          
    }

    EtudiantRow.innerHTML = '';
    let id_etudiant = null;

    params.forEach(element => {
        if (id_etudiant == null || id_etudiant != element['id_user']) {
            id_etudiant = element['id_user'];
            EtudiantRow.innerHTML += `<div id="Cours${element['id_cour']}" class="bg-white rounded-lg shadow-md overflow-hidden">
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
                                                    <p class="text-sm font-semibold">Mr.${element['username']}</p>
                                                    <p class="text-xs text-gray-500">${element['createDate']}</p>
                                                </div>
                                            </div>
                                            <div class="catalog flex items-center justify-between">
                                                <div class="text-sm text-gray-500">
                                                    <i class="fas fa-folder-open mr-2"></i>
                                                    ${element['catalogue_titre']}</span>
                                                </div>`;
                                            if (element['role'] == 'Etudiant') {
                                                carteCoure = document.querySelector(`#Cours${element['id_cour']} .catalog`);
                                                carteCoure.innerHTML += `<a href="./Details.php?idCours=${element['id_cour']}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Voir le cours</a>`;
                                            }
                                            `</div>
                                        </div>
                                    </div>`;

        }
    });
}

let searchTime;
InputSearch.addEventListener('input', () => {
    clearTimeout(searchTime);
    searchTime = setTimeout(filterEtudiant, 150);
});


selectCatalogue.addEventListener('change', filterEtudiant);

document.addEventListener('DOMContentLoaded', filterEtudiant);