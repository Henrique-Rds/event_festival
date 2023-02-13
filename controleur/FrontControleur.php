<?php
// Auto chargement des classes utilisées
require_once("../Autoloader.php");
require_once("../modele/EvenementsModel.php");
require_once(__DIR__.'/../Constantes.php');

session_start();

if (isset($_GET['action']))
    
    $requested_page = htmlspecialchars($_GET['action']);
else 
    // Retourner la page d'authentification
    $requested_page = 'accueil';

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
            $tab_evenements = $modeleEvenement->getAll();
            $_SESSION['tableau'] = $tab_evenements;
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/accueil.php');
        }

        // // Positionner le tableau en variable de session 
        // $_SESSION['tableau'] = $tab_evenements;

        // Retourner la page Evenement.php : page d'Evenement de l'application
        header("Location: ../vue/Evenement.php");
    break;
}
?>