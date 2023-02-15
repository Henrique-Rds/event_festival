<?php
// Auto chargement des classes utilisées
require_once("../Autoloader.php");
require_once("../modele/EvenementsModel.php");
require_once("../modele/artisteModel.php");
require_once(__DIR__.'/../Constantes.php');

session_start();


if (isset($_GET['action'])){
    $requested_page = htmlspecialchars($_GET['action']);

    // if (isset($_SESSION['id'])){
    //     $id = htmlspecialchars($_SESSION['id']);
    // }
} else {
    // Retourner la page d'authentification
    $requested_page = 'accueil';
}
    
// Supprimer les variables de session pour ne pas les garder en cache
if (isset( $_SESSION["Evenements"] ))
    unset( $_SESSION["Evenements"] );

if (isset( $_SESSION["OneEvent"] ))
    unset( $_SESSION["OneEvent"] ); 

if (isset( $_SESSION["Artistes"] ))
    unset( $_SESSION["Artistes"] );

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
            
            $modeleEvenement = new EvenementsModel();
            $_SESSION["Evenements"] = $modeleEvenement->getAll();
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec les events."; 
            // Retourner la page accueil.php
            header('Location: ../vue/accueil.php');
            break;
        }

        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php");
    break;

    // action lors de la confirmation de l'ajout d'un Evenement
    case 'addEvent':
        try {
            if (!empty($_POST['nom_event']) && !empty($_POST['date_event'])  && !empty($_POST['duree_event']) && !empty($_POST['lieu_event']) && !empty($_POST['nb_places'])) {
                $nom_event = htmlspecialchars($_POST["nom_event"]);
                $date_event = htmlspecialchars($_POST["date_event"]);
                $duree_event = htmlspecialchars((int)$_POST["duree_event"]);
                $lieu_event = htmlspecialchars($_POST["lieu_event"]);
                $nb_places = htmlspecialchars($_POST["nb_places"]);
                $modeleEvenement = new EvenementsModel();
                $modeleEvenement->createEvenement($nom_event,$date_event,$duree_event,$lieu_event,$nb_places);
            } else {    
                $_SESSION['message'] = "Problème technique a la creation de l event."; 
                var_dump($_POST);
                var_dump($_SESSION);
                header('Location: ../vue/addEvenement.php');
            }
        }

        // Problème : exemple -> Impossible de se connecter à la BD ou autre
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique a la creation de l event."; 
            break;
        }
        $_SESSION["Evenements"] = $modeleEvenement->getAll();
        header("Location: ../vue/Evenement.php");
    break;


    //lien entre la page Evenement et la page de modification d'Evenement
    case 'toModifEvent':
        try {

            if (!empty($_GET['id_event'])){
                
                $modeleEvenement = new EvenementsModel();
                $_SESSION["OneEvent"] = $modeleEvenement->getOne(htmlspecialchars($_GET['id_event']));
                
            } else {    
                $_SESSION['message'] = "Problème technique au niveau de la récuperation de l'id de l'evenement."; 
                header('Location: ../vue/accueil.php');
            }
        }
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique vers la page."; 
            header('Location: ../vue/accueil.php');
        }
        header("Location: ../vue/modifEvenement.php");
    break;

    case 'modifEvent':
        try {

            if (!empty($_POST['id_event']) && !empty($_POST['nom_event']) && !empty($_POST['date_event'])  && !empty($_POST['duree_event']) && !empty($_POST['lieu_event']) && !empty($_POST['nb_places'])) {
                $id_event = htmlspecialchars($_POST["id_event"]);
                $nom_event = htmlspecialchars($_POST["nom_event"]);
                $date_event = htmlspecialchars($_POST["date_event"]);
                $duree_event = htmlspecialchars($_POST["duree_event"]);
                $lieu_event = htmlspecialchars($_POST["lieu_event"]);
                $nb_places = htmlspecialchars($_POST["nb_places"]);
                $modeleEvenement = new EvenementsModel();
                $modeleEvenement->updateEvenement($nom_event,$date_event,$duree_event,$lieu_event,$nb_places,$id_event);
                
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


        // Retourner la page Evenement.php : page d'Evenement de l'application
        $_SESSION["Evenements"] = $modeleEvenement->getAll();
        header("Location: ../vue/Evenement.php");
    break;

    //Action de suppression d'Evenement
    case 'supprEvenement':
        try {
            $modeleEvenement = new EvenementsModel();
            $modeleEvenement->deleteOne($_GET['id']);
            $_SESSION["Evenements"] = $modeleEvenement->getAll();
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec la supression de event."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php");
    break;
    

    case 'artistes':
        try {
            
            //$modeleEvenement = new modele\ArtisteModel\ArtisteModel();
            $artisteModel = new ArtisteModel();
            $_SESSION["Artistes"] = $artisteModel->getAll();
            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }


        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Artistes.php");
    break;


    case 'modifArtiste':
        try {


            if (!empty($_POST['nom_artiste']) && !empty($_POST['nb_musiques'])) {
                $nom_artiste = htmlspecialchars($_POST["nom_artiste"]);
                $nb_musiques = htmlspecialchars((int)$_POST["nb_musiques"]);
                $artisteModel = new ArtisteModel();
                $artisteModel->updateArtiste($nom_artiste,$nb_musiques, $id_artistes);
                
            } else {    
                $_SESSION['message'] = "Problème technique try catch."; 
                // header('Location: ../vue/accueil.php');
            }
            var_dump($_POST);
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            // header('Location: ../vue/accueil.php');
        }


        // Retourner la page Artiste.php : page d'artiste de l'application
        // $_SESSION["Artistes"] = $artisteModel->getAll();
        // header("Location: ../vue/Artistes.php");
    break;

    case 'updateArtiste':
        try {
            
            if (isset($_GET['id_artiste'])){
                $id_artistes = htmlspecialchars($_GET['id_artiste']);
                $_SESSION["id_artiste"] = $id_artistes;
                header('Location: ../vue/modifArtiste.php');
            }
        }

        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
    break;

    case 'addArtiste':
        try {
            if (!empty($_POST['nom_artiste']) && !empty($_POST['nb_musiques'])) {
                $nom_artiste = htmlspecialchars($_POST["nom_artiste"]);
                $nb_musiques = htmlspecialchars((int)$_POST["nb_musiques"]);
                $artisteModel = new ArtisteModel();
                $artisteModel->createArtiste($nom_artiste,$nb_musiques);
                
                
            } else {    
                echo "N0, mail is not set";
                header('Location: ../vue/accueil.php');
            }
            
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }
        $_SESSION["Artistes"] = $artisteModel->getAll();
        header("Location: ../vue/Artistes.php");
    break;

}
?>