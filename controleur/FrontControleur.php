<?php
// Auto chargement des classes utilisées
require_once("../Autoloader.php");
require_once("../modele/EvenementsModel.php");
require_once("../modele/artisteModel.php");
require_once(__DIR__.'/../Constantes.php');

session_start();


if (isset($_GET['action'])){

    var_dump($_GET['action']);
    $requested_page = htmlspecialchars($_GET['action']);

    if (isset($_SESSION['id'])){
        $id = htmlspecialchars($_SESSION['id']);
    }
} else {
    // Retourner la page d'authentification
    $requested_page = 'accueil';
}
    
if (isset( $_SESSION["Evenements"] ))
    unset( $_SESSION["Evenements"] );

if (isset( $_SESSION["Artistes"] ))
    unset( $_SESSION["Artistes"] );

if (isset( $_SESSION["message"] ))
    unset( $_SESSION["message"] );

switch ($requested_page) {
     // Afficher la page d'accueil
    case 'accueil':
        // Retourner la page accueil.php : page d'accueil de l'application
        header("Location: ../vue/accueil.php");
    break;

    case 'evenement':
        try {
            
            //$modeleEvenement = new modele\EnvenementsModel\EvenementsModel();
            $modeleEvenement = new EvenementsModel();
            $_SESSION["Evenements"] = $modeleEvenement->getAll();
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique avec les events."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }

        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php");
    break;

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

}
?>