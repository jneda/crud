<?php

require_once 'DBConnect.php';

$sql = 'SELECT * FROM t_formation';

$stmt = $dbh->query($sql);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($courses);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des formations</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        Liste des formations
      </h1>
      <a href="createCourse.php" class="btn btn-outline-info ms-auto link-light">Ajouter une formation</a>
      <a href="list.php" class="btn btn-outline-info ms-auto link-light">Liste des stagiaires</a>
    </div>
  </header>
  <section class="container my-5">
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Libellé</th>
            <th scope="col">Acronyme</th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo '<h1> Nombre de formations : ' . (count($courses)) . '</h1>';
          foreach ($courses as $course) {
            echo '<tr>';
            echo '<td>' . $course['idFormation'] . '</td>';
            echo '<td>' . $course['titreFormation'] . '</td>';
            echo '<td>' . $course['acronyme'] . '</td>';
            echo '<td>
                                <a href="updateCourse.php?id=' . $course['idFormation'] . '" class="btn btn-outline-success"><i class="bi bi-pencil"></i></a>
                                <a href="deleteCourse.php?id=' . $course['idFormation'] . '" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
                                </td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
      <?php
      $dbh = null;
      ?>
    </div>
  </section>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>