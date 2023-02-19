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


    <title>addGestion</title>
  </head>

  <body>

    <h1>Ajouter un artiste à un évenement</h1>
    <form class="row g-3" action="../controleur/FrontControleur.php?action=addGestion" method="POST">
        <div class="col-12">
           
            <select name="id_event_gestion" id="id_event_gestion">
                <option value="">--Choisissez un évènement--</option>
                <?php
                     foreach (unserialize($_GET['donnes_evenement']) as $gestion) {
                        ?>
                        <option name="event_id" value="<?php print_r($gestion['id']);?>"><?php print_r($gestion['evenements_nom']);?></option>
                        <?php
                    }
            ?>
            </select>
        </div>
        <div class="col-12">
            <select name="id_artiste_gestion" id="id_artiste_gestion">
                <option value="">--Choisissez un artiste--</option>
                    <?php
                        foreach (unserialize($_GET['donnes_artiste']) as $gestion) {
                            ?>
                            <option name="artiste_id" value="<?php print_r($gestion['id']); ?>"><?php print_r($gestion['artiste_nom']); ?></option>
                            <?php
                        }
                    ?>
            </select>
        </div>

        <div class="btn-form">
            <a href="../controleur/FrontControleur.php?action=gestion" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
  </body>

</html>