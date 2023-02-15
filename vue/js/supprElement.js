var id;

function getSupprEvent(elementId){
    console.log(elementId);
    id = elementId;
}
// document.getElementsByClassName("supprButton").addEventListener("click", function() {
//     id = document.getElementById("supprButton").value;
//     console.log(id);

// });

function redirectSupprEvenement(){
    if (id != null) {
        console.log(id);
        window.location.replace("../controleur/FrontControleur.php?action=supprEvenement&id=" + id);
    }

}
    
// document.getElementsByClassName("supprButtonConfirm").addEventListener("click", function() {
//     // redirect("../controleur/FrontControleur.php?action=supprButton&id=" + id);
//     window.location.replace("../controleur/FrontControleur.php?action=supprEvenement&id=" + id);

// });

