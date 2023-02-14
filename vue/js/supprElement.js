var id;

document.getElementById("supprButton").addEventListener("click", function() {
    id = document.getElementById("supprButton").value;
    console.log(id);

});
    
document.getElementById("supprButtonConfirm").addEventListener("click", function() {
    // redirect("../controleur/FrontControleur.php?action=supprButton&id=" + id);
    window.location.replace("../controleur/FrontControleur.php?action=supprEvenement&id=" + id);

});

