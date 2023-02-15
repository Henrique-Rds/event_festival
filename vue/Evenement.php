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
  <link rel="stylesheet" href="Event.css">

  <title>Evenements a venir</title>
</head>

<body>
    <h1>Evenements à venir</h1>
  
    <table class="table">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Date</th>
                  <th scope="col">Duree</th>
                  <th scope="col">Lieu</th>
                  <th scope="col">Places Disponibles</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>
            <?php
                foreach ($_SESSION["Evenements"] as $evenement) {
                    ?>
                    <tr>
                        <td><?php print_r($evenement['evenements_nom']);?></td>
                        <td><?php print_r($evenement['evenements_date']); ?></td>
                        <td><?php print_r($evenement['evenements_duree']); ?></td>
                        <td><?php print_r($evenement['lieu']); ?></td>
                        <td><?php print_r($evenement['evenements_place_dispo']); ?></td>
                        <td>
                            <a type="button" class="btn btn-primary"  href=<?php print_r("../controleur/FrontControleur.php?action=toModifEvent&id_event=".$evenement['id'])?>>
                                Modifier
                            </a>
                            <button  type="button" id=<?php print_r($evenement['id']); ?> class="btn btn-danger" onclick="getSupprEvent(this.id)" data-toggle="modal" data-target="#popup-eventSuppr">
                                Supprimer
                            </button>
                    </tr>
                    <?php
                }
            ?>
              
          
          </tbody>
      </table>


    <!-- Button -->
    <a class="btn btn-primary" href="../vue/accueil.php">Retour à l'accueil</a>
    <a class="btn btn-primary"  href="../vue/addEvenement.php">Ajouter</a>
    

    <!-- Pop-up supression -->
    <div id="popup-eventSuppr" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <br/>
                    <h1>Supprimer l'évènement ?</h1>
                    <br/>
                    <br/>
                    <div class="btn-form">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button  class="btn btn-danger"  onclick="redirectSupprEvenement()">Supprimer</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/supprElement.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
</body>

</html>