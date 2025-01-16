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