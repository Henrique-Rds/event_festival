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
    <h1>Les artistes</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom du groupe</th>
                <th scope="col">Nombre de musiques</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                    foreach ($_SESSION["Artistes"] as $artistes) {
                        ?>
                        <tr>
                            <td><?php print_r($artistes['artiste_nom']);?></td>
                            <td><?php print_r($artistes['artiste_nb_musique']); ?></td>
                        </tr>
                        <?php
                    }
            ?>
        </tbody>
    </table>



    <!-- Button
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup-event">
        Ajouter
    </button> -->
    <!-- Pop-up -->
    <!-- <div id="popup-event" class="modal">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                        
                            <form class="row g-3">
                            <div class="col-7">
                                <label for="inputEmail4" class="form-label">Nom</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-5">
                                <label for="inputEmail4" class="form-label">Nom</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                </div>
                            <div class="btn-form">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
  </body>

</html>