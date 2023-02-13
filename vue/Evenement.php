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

    <title>Evenements a venir</title>
  </head>

  <body>
    <h1>Evenements à venir</h1>
    <?php
        foreach ($_SESSION["Evenements"] as $a) {
          print_r ($a); 
                            
          }
    ?>

  <table class="table">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Date</th>
                  <th scope="col">Duree</th>
                  <th scope="col">Lieu</th>
                  <th scope="col">Places Disponibles</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>Mark</td>
              </tr>
              <tr>

                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>Mark</td>
              </tr>
              <tr>

                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>Mark</td>
              </tr>
          </tbody>
      </table>





      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
  </body>

</html>