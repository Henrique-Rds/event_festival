<?php
// Auto chargement des classes utilisées
require_once("../Autoloader.php");
require_once("../modele/EvenementsModel.php");
require_once("../modele/artisteModel.php");
require_once("../modele/GestionModel.php");
require_once(__DIR__.'/../Constantes.php');

session_start();


if (isset($_GET['action'])){
    $requested_page = htmlspecialchars($_GET['action']);

} else {
    
    $requested_page = 'accueil';
}

if (isset( $_SESSION["message"] ))
    unset( $_SESSION["message"] );


switch ($requested_page) {

     // Afficher la page d'accueil
     //page par défault de l'application et page de redirection en cas d'erreur
    case 'accueil':
        // Retourner la page accueil.php : page d'accueil de l'application
        header("Location: ../vue/accueil.php");
    break;

    // Afficher la page d'Evenement
    case 'evenement':
        try {
            
            // creation d'un objet EvenementModel
            $modeleEvenement = new EvenementsModel();
            // recuperation de la liste des Evenements
            $Evenements = $modeleEvenement->getAll();

        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec les events."; 
            // Retourner la page accueil.php
            header('Location: ../vue/accueil.php');
            break;
        }

        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php?donnes_evenement=".serialize($Evenements));
    break;

    // action lors de la confirmation de l'ajout d'un Evenement
    case 'addEvent':
        try {
            // verification des champs
            if (!empty($_POST['nom_event']) && !empty($_POST['date_event'])  && !empty($_POST['duree_event']) && !empty($_POST['lieu_event']) && !empty($_POST['nb_places'])) {
                $nom_event = htmlspecialchars($_POST["nom_event"]);
                $date_event = htmlspecialchars($_POST["date_event"]);
                $duree_event = htmlspecialchars($_POST["duree_event"]);
                $lieu_event = htmlspecialchars($_POST["lieu_event"]);
                $nb_places = htmlspecialchars($_POST["nb_places"]);
                // creation d'un objet EvenementModel
                $modeleEvenement = new EvenementsModel();
                // ajout de l'Evenement
                $modeleEvenement->createEvenement($nom_event,$date_event,$duree_event,$lieu_event,$nb_places);
            } else {    
                $_SESSION['message'] = "Problème technique a la creation de l event."; 
                header('Location: ../vue/addEvenement.php');
            }
        }

        // Problème : exemple -> Impossible de se connecter à la BD ou autre
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique a la creation de l event."; 
            break;
        }
        // recuperation de la liste des Evenements
        $Evenements = $modeleEvenement->getAll();
        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php?donnes_evenement=".serialize($Evenements));
    break;


    //lien entre la page Evenement et la page de modification d'Evenement
    case 'toModifEvent':
        try {
            // verification des champs
            if (!empty($_GET['id_event'])){
                
                // creation d'un objet EvenementModel
                $modeleEvenement = new EvenementsModel();
                // recuperation d'un Evenement
                $Evenements = $modeleEvenement->getOne(htmlspecialchars($_GET['id_event']));
                
            } else {    
                $_SESSION['message'] = "Problème technique au niveau de la récuperation de l'id de l'evenement."; 
                header('Location: ../vue/accueil.php');
            }
        }
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique vers la page."; 
            header('Location: ../vue/accueil.php');
        }
        // on va vers la page de modification d'Evenement
        header("Location: ../vue/modifEvenement.php?donnes_evenement=".serialize($Evenements));
    break;

    case 'modifEvent':
        try {
            // verification des champs
            if (!empty($_POST['id_event']) && !empty($_POST['nom_event']) && !empty($_POST['date_event'])  && !empty($_POST['duree_event']) && !empty($_POST['lieu_event']) && !empty($_POST['nb_places'])) {
                $id_event = htmlspecialchars($_POST["id_event"]);
                $nom_event = htmlspecialchars($_POST["nom_event"]);
                $date_event = htmlspecialchars($_POST["date_event"]);
                $duree_event = htmlspecialchars($_POST["duree_event"]);
                $lieu_event = htmlspecialchars($_POST["lieu_event"]);
                $nb_places = htmlspecialchars($_POST["nb_places"]);
                // creation d'un objet EvenementModel
                $modeleEvenement = new EvenementsModel();
                // mise à jour de l'Evenement
                $modeleEvenement->updateEvenement($nom_event,$date_event,$duree_event,$lieu_event,$nb_places,$id_event);
                
            } else {    
                $_SESSION['message'] = "Champs de modif vide."; 
                header('Location: ../vue/accueil.php');
            }
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique au niveau de l'update de event."; 
            // Retourner la page accueil.php
            header('Location: ../vue/accueil.php');
        }


        // recuperation de la liste des Evenements
        $Evenements = $modeleEvenement->getAll();
        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php?donnes_evenement=".serialize($Evenements));
    break;

    //Action de suppression d'Evenement
    case 'supprEvenement':
        try {
            $modeleEvenement = new EvenementsModel();
            $modeleEvenement->deleteOne($_GET['id']);
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec la supression de event."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
        $Evenements = $modeleEvenement->getAll();
        header("Location: ../vue/Evenement.php?donnes_evenement=".serialize($Evenements));
    break;
    

    case 'artistes':
        try {
            
            // On instancie la classe dans notre modele
            $modeleArtiste = new ArtisteModel();
            $Artiste = $modeleArtiste->getAll();
            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique sur le select artistes."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }


        // Retourner la pageArtistes.php : page d'Artistes de l'application
        header("Location: ../vue/Artistes.php?donnes_artiste=".serialize($Artiste));
    break;


    case 'toModifArtiste':
        try {
            // On récupere l id_artiste qui se trouve dans l URL
            if (!empty($_GET['id_artiste'])){
                
                $modeleArtiste = new ArtisteModel();
                $Artiste = $modeleArtiste->getOne(htmlspecialchars($_GET['id_artiste']));
                
            } else {    
                $_SESSION['message'] = "Problème technique au niveau de la récuperation de l'id de l'Artiste."; 
                header('Location: ../vue/accueil.php');
            }
        }
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec update artistes."; 
            header('Location: ../vue/accueil.php');
        }
        header("Location: ../vue/modifArtiste.php?donnes_artiste=".serialize($Artiste));
    break;


    case 'modifArtiste':
        try {
            // On verifie le contenu des inputs
            if (!empty($_POST['id_artiste']) && !empty($_POST['nom_artiste']) && !empty($_POST['nb_musiques'])) {
                // On met tous les post dans des variables
                $id_artiste = htmlspecialchars($_POST["id_artiste"]);
                $nom_artiste = htmlspecialchars($_POST["nom_artiste"]);
                $nb_musique = htmlspecialchars($_POST["nb_musiques"]);
                // on instancie et on update
                $modeleArtiste = new ArtisteModel();
                $modeleArtiste->updateArtiste($nom_artiste,$nb_musique,$id_artiste);
                
            } else {    
                $_SESSION['message'] = "Champs de modif vide."; 
                // header('Location: ../vue/accueil.php');
            }
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique au niveau de l'update de event."; 
            // Retourner la page accueil.php
            header('Location: ../vue/accueil.php');
        }


        // Retourner la page Artiste.php : page d'Artiste de l'application
        $Artiste = $modeleArtiste->getAll();
        header("Location: ../vue/Artistes.php?donnes_artiste=".serialize($Artiste));
    break;

    case 'addArtiste':
        try {
            // On verifie le contenu des inputs
            if (!empty($_POST['nom_artiste']) && !empty($_POST['nb_musiques'])) {
                $nom_artiste = htmlspecialchars($_POST["nom_artiste"]);
                $nb_musiques = htmlspecialchars((int)$_POST["nb_musiques"]);
                // on instancie et on cree
                $modeleArtiste = new ArtisteModel();
                $modeleArtiste->createArtiste($nom_artiste,$nb_musiques);
                
                
            } else {    
                $_SESSION['message'] = "Problème technique au niveau de create de artiste."; 
                header('Location: ../vue/accueil.php');
            }
            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec l ajout d'artistes."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
        $Artiste = $modeleArtiste->getAll();
        header("Location: ../vue/Artistes.php?donnes_artiste=".serialize($Artiste));
    break;

    //Action de suppression d'Evenement
    case 'supprArtiste':
        try {
            $modeleArtiste = new ArtisteModel();
            $modeleArtiste->deleteOne($_GET['id']);
            $Artiste = $modeleArtiste->getAll();
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec la supression de l artiste."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
        // Retourner la page Artiste.php : page d'Artiste de l'application
        header("Location: ../vue/Artistes.php?donnes_artiste=".serialize($Artiste));
    break;


    // GESTION ARTISTES ET EVENEMENTS
    case 'gestion':
        try {
            // On instancie la classe dans notre modele
            $modeleGestion = new GestionModel();
            // on stocke le résultat du getAll version gestionnaire dans une variable
            $Gestion = $modeleGestion->getAssociation();
            
            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }


        // Retourner la page GestionArtisteEvent.php : page de Gestion des Artiste et Event de l'application
        header("Location: ../vue/GestionArtisteEvent.php?gestion=".serialize($Gestion));
    break;

    case 'toaddGestion':
        try {

            // On instancie la classe dans notre modele
            $modeleArtiste = new ArtisteModel();
            // on stocke le résultat du getAll version gestionnaire dans une variable
            $Artiste = $modeleArtiste->getAll();

            $modeleEvenement = new EvenementsModel();
            $Evenements = $modeleEvenement->getAll();

            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec l ajout de gestion."; 
            // Retourner la page accueil
            header('Location: ../vue/accueil.php');
        }
        // Retourner la page GestionArtisteEvent.php : page de Gestion des Artiste et Event de l'application
        header("Location: ../vue/addGestion.php?donnes_evenement=".serialize($Evenements)."&donnes_artiste=".serialize($Artiste));
    break;

    case 'addGestion':
        try {
            // On verifie le contenu des inputs
            if (!empty($_POST['id_event_gestion']) && !empty($_POST['id_artiste_gestion'])) {
                $event_id = htmlspecialchars($_POST["id_event_gestion"]);
                $artiste_id = htmlspecialchars((int)$_POST["id_artiste_gestion"]);
                // on instancie et on crée
                $modeleGestion = new GestionModel();
                $modeleGestion->createAssociation($event_id,$artiste_id);
                
                
            } else {    
                echo "Erreur trouvée dans les champs";
                header('Location: ../vue/accueil.php');
            }
            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
        // creation d'un modele pour la gestion
        $Gestion = $modeleGestion->getAssociation();
        // Retourner la page GestionArtisteEvent.php : page de Gestion des Artiste et Event de l'application
        header("Location: ../vue/GestionArtisteEvent.php?gestion=".serialize($Gestion));
    break;


    //Action de suppression d'Evenement
    case 'supprGestion':
        try {
            $modeleGestion = new GestionModel();
            $idEvent = htmlspecialchars($_GET['idEvent']);
            $idArtiste = htmlspecialchars($_GET['idArtiste']);
            $modeleGestion->deleteGestionArtisteEvent( $idEvent , $idArtiste );
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec la supression de la gestion."; 
            header('Location: ../vue/accueil.php');
        }
        // creation d'un modele pour la gestion
        $modeleGestion = new GestionModel();
        // on stocke le résultat du getAll  dans une variable
        $Gestion = $modeleGestion->getAssociation();
        // Retourner la page de gestion : page de gestion d'artiste et événement de l'application
        header("Location: ../vue/GestionArtisteEvent.php?gestion=".serialize($Gestion));
    break;

}
?>