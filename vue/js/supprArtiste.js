var id;

function getSupprArtiste(elementId){
    console.log(elementId);
    // On stocke notre id dans une variable JS
    id = elementId;
}

function redirectSupprArtiste(){
    if (id != null) {
        console.log(id);
        // On renvoie au frontcontroleur avec l id 
        window.location.replace("../controleur/FrontControleur.php?action=supprArtiste&id=" + id);
    }

}
    

