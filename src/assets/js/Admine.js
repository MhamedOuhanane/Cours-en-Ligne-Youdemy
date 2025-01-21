const colors = [
    '#3B82F6',  
    '#EF4444', 
    '#10B981', 
    '#EAB308', 
    '#F97316',  
    '#9333EA',  
    '#DC2626',  
    '#2563EB',  
    '#F59E0B',  
    '#FBBF24',  
    '#F43F5E',  
    '#F87171',  
    '#60A5FA',  
    '#2563EB', 
    '#34D399',   
    '#059669',  
    '#0F766E',  
    '#D946EF',  
    '#8B5CF6',  
    '#6B21A8'  
];
// fetch
const url = './proccessors/crud/fetchCata.php';

fetch(url)
.then(response => response.json())
.then(data=>{
    DashboardManager.initializeCategoriesChart(data);
    
})
.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
});

// returne data pour la diagramme des catégorie
function GetDataCatégorie(data){
    let catégoriedata = [];
    let categorie = {};
    if (data != null) {
        data.forEach((element, index) => {
            categorie = {
                'catégorie' : element.catalogue_titre,
                'CoursNB' : element.coursCount,
                'colors' : colors[index]
            }
            
            catégoriedata.push(categorie);  
        });
    }
    return catégoriedata;
}


const DashboardManager = {
    initializeCategoriesChart(data) {
        let categorie = [];
        let CoursNB = [];
        let colorCa = [];
        GetDataCatégorie(data).forEach((element,index) => {
            categorie[index] = element.catégorie;
            CoursNB[index] = element.CoursNB;
            colorCa[index] = element.colors;
        });
        
        
        const ctx = document.getElementById('coursesChart')?.getContext('2d');
        if (!ctx) return;

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: categorie,
                datasets: [{
                    data: CoursNB,
                    backgroundColor: colorCa
                }]

            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    },
};

// // Initialize when DOM is loaded
// document.addEventListener('DOMContentLoaded', () => {
//     DashboardManager.init();
// });