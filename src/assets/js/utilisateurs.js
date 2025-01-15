let btnValidation = document.querySelectorAll(".utilisateurs .btnStatus");
let carte = null;

if (btnValidation) {
    btnValidation.forEach(element => {
        element.addEventListener('click', ()=> {
            carte = element.closest('.utilisateurs ');
            idUser = element.dataset['iduser'];
            statusEn = element.dataset['status'];
            
            GestionsUsers(carte, idUser, statusEn);
        });
    });
    
}

function MiseAJourStyle() {
    let parent = carte.querySelector('.parent');
    let btnStatus = parent.querySelector('.btnStatus');
    if (statusEn == 'Activé') {
        btnStatus.remove();
        let button = document.createElement('button');
        button = `<button data-iduser="${idUser}" data-status="Suspendu" class="btnStatus flex-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        <i class="fas fa-pause mr-2"></i>Suspendu
                    </button>`;
        

    } else if (statusEn == 'Susponsu') {
        
    } else {
        carte.remove();
    }
}

function GestionsUsers(carte, idUser = null, status = null, parent = null) {
    const url = `./crud/validarionEnsei.php?idUser=${idUser}&status=${status}`;
    fetch(url)
    .then(Response => Response.json())
    .then(data => {
        if (data) {
        }
    })
}