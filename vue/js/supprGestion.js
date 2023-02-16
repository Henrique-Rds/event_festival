var idEvent;
var idArtiste;

function getSupprGestion(identifiantEvent , identifiantArtiste){
    console.log(identifiantEvent);
    console.log(identifiantArtiste);
    // On stocke notre id dans une variable JS
    idEvent = identifiantEvent;
    idArtiste = identifiantArtiste;
}

function redirectSupprGestion(){
    console.log("idEvent : " + idEvent);
    console.log("idArtiste : " + idArtiste);
    if (idEvent != null && idArtiste != null) {
        console.log("conditon valide");
        // On renvoie au frontcontroleur avec l id 
        window.location.replace("../controleur/FrontControleur.php?action=supprGestion&idEvent=" + idEvent +"&idArtiste=" + idArtiste);
    }

}
    