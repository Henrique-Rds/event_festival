<!doctype html>
<?php
    session_start();
?>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="images/Logo_Ideal_Concert_Blanc.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="Artiste.css">


    <title>Ajout d'Evenements</title>
  </head>

  <body>

    <h1>Ajouter un évènement</h1>
    <form class="row g-3" action="../controleur/FrontControleur.php?action=addEvent" method="POST">
        <div class="col-12">
            <label for="nom_event" class="form-label">Nom de l'évènement</label>
            <input type="text"  maxlength="50" class="form-control" id="nom_event" name="nom_event">
        </div>
        <div class="col-12">
            <label for="date_event" class="form-label">Date de l'évènement</label>
            <input type="datetime-local" class="form-control" id="date_event" name="date_event">
        </div>
        <div class="col-12">
            <label for="duree_event" class="form-label">Duree de l'évènement</label>
            <input type="number"  maxlength="11" class="form-control" id="duree_event" name="duree_event">
        </div>
        <div class="col-12">
            <label for="lieu_event" class="form-label">Lieu de l'évènement</label>
            <input type="text"  maxlength="250" class="form-control" id="lieu_event" name="lieu_event">
        </div>
        <div class="col-12">
            <label for="nb_places" class="form-label">Nombre de places de l'évènement</label>
            <input type="number"  maxlength="11" class="form-control" id="nb_places" name="nb_places">
        </div>

        <div class="btn-form">
            <a href="../controleur/FrontControleur.php?action=evenement" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>

        
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
  </body>

</html>