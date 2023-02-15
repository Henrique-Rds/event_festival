<!doctype html>
<?php
    session_start();
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="images/Logo_Ideal_Concert_Blanc.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="Artiste.css">


    <title>Artises</title>
  </head>

  <body>

    <h1>Ajouter un artiste</h1>
    <form class="row g-3" action="../controleur/FrontControleur.php?action=addArtiste" method="POST">
        <div class="col-12">
            <label for="nom_artiste" class="form-label">Nom de l'artiste</label>
            <input type="text" class="form-control" id="nom_artiste" name="nom_artiste" maxlength="50">
        </div>
        <div class="col-12">
            <label for="nb_musiques" class="form-label">Nombre de musiques</label>
            <input type="number" class="form-control" id="nb_musiques" name="nb_musiques" maxlength="11">
        </div>

        <div class="btn-form">
            <a href="../controleur/FrontControleur.php?action=artistes" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>

        
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
  </body>

</html>