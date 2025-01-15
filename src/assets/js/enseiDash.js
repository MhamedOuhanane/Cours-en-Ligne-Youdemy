let btnValidation = document.querySelectorAll(".enseignant .btnValidation");
let carte = null;

if (btnValidation) {
    btnValidation.forEach(element => {
        element.addEventListener('click', ()=> {
            carte = element.closest('.enseignant ');
            idUser = element.dataset['iduser'];
            statusEn = element.dataset['status'];
            
            ValidationEnseign(carte, idUser, statusEn);
        });
    });
    
}

function ValidationEnseign(carte, idUser = null, status = null) {
    const url = `./crud/validarionEnsei.php?idUser=${idUser}&status=${status}`;
    fetch(url)
    .then(Response => Response.json())
    .then(data => {
        if (data) {
            carte.remove();
        }
    })
}
