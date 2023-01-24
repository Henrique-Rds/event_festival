<?php
// Auto chargement des classes utilisées
require_once("../Autoloader.php");
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
}
?>