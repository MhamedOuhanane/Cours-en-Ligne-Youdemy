let btnValide = document.querySelectorAll(".enseignant .valide");
let btnRefuse = document.querySelectorAll(".enseignant .refuse");
let carte = null;

if (btnValide) {
    btnValide.forEach(element => {
        element.addEventListener('click', ()=> {
            carte = element.closest('.enseignant ');
            idUser = element.dataset['valide'];
            ValidationEnseigb(carte, idUser, 'Activé');
        });
    });
    
}

function ValidationEnseigb(carte, idUser = null, status = null) {
    const url = `./crud/validarionEnsei.php?idUser=${idUser}&status=${status}`;
    fetch(url)
    .then(Response => Response.json())
    .then(data => {
        if (data) {
            carte.remove();
        }
    })
}
