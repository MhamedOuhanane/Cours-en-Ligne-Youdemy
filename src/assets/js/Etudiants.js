function filterEtudiant() {
    const searchValue = InputSearch.value;
    const filterCata = selectCatalogue.value;
    const urlfiltre = `./crud/fetchEtudiants.php?CatalogueId=${filterCata}&Search=${searchValue}`;
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
                                            <span>Aucun Etudiant inscret</span>
                                        </div>
                                    </td>
                                </tr>`;  
        return;          
    }

    EtudiantRow.innerHTML = '';

    params.forEach(element => {
        EtudiantRow.innerHTML += `<tr id="Inscription${element['id_inscription']}" >
                                    <td class=" px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="data:imagr/png;base64,${element['image']}" alt="Student" class="w-10 h-10 rounded-full mr-3">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">${element['username']}</div>
                                                <div class="text-sm text-gray-500">${element['email']}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">${element['cours_titre']}</div>
                                        <div class="text-sm text-gray-500">${element['catalogue_titre']}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">${element['date_inscret']}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button data-ban="${element['id_inscription']}" class="banEtudiant text-red-600 hover:text-red-900">
                                                <i class="fas fa-ban"></i>Ban
                                            </button>
                                        </div>
                                    </td>
                                </tr>`;
    });
    let banBTN = document.querySelectorAll('.banEtudiant');
    banBTN.forEach(element => {
        element.addEventListener('click', () => {
            const id_inscription = element.dataset['ban'];
            banEtudiant(id_inscription);
        })
    });
}

let searchTime;
InputSearch.addEventListener('input', () => {
    clearTimeout(searchTime);
    searchTime = setTimeout(filterEtudiant, 150);
});


selectCatalogue.addEventListener('change', filterEtudiant);

document.addEventListener('DOMContentLoaded', filterEtudiant);


// fonction de delete 
function deleteCours(id) {
    const urlDelete = `./crud/deleteInscriprionCous.php?DeleteCours=${id}`;
    
    fetch(urlDelete)
    .then(response => response.json())
    .then(data => {
            if (data) {
                const cours = document.querySelector(`#Cours${id}`);
                cours.remove();
            }
            
        })
        // .catch(error => {
        //     CoursesGrid.innerHTML = `<div class="col-span-full text-center text-red-500">
        //                                 <span>ERREUR : ${error.message}</span>
        //                             </div>`;
        // });
}