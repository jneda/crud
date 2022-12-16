<?php

require_once 'DBConnect.php';

$query = $dbh->prepare('
  SELECT * FROM t_stagiaire AS S
  JOIN t_ville as V ON V.idVille = S.idVille
  JOIN t_formation as F ON F.idFormation = S.idFormation
  ORDER BY S.idStagiaire
');
$query->execute();
$stagiaires = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des stagiaires 😼</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Boostrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        Liste des stagiaires
      </h1>
    </div>
    <a href="create.php" class="btn btn-outline-info ms-auto link-light">Créer un stagiaire</a>
  </header>

  <div class="container mt-5">
    <div class="row">
      <h1>Nombre de stagiaires : <?= count($stagiaires) ?></h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Identifiant</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Civilité</th>
            <th scope="col">Adresse</th>
            <th scope="col">CP</th>
            <th scope="col">Ville</th>
            <th scope="col">Mail</th>
            <th scope="col">Formation</th>
            <th scope="col">Acronyme</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($stagiaires as $stagiaire) {
            echo '<tr>';
            echo '<th scope="row">' . $stagiaire['idStagiaire'] . '</th>';
            echo '<td>' . $stagiaire['nomStagiaire'] . '</td>';
            echo '<td>' . $stagiaire['prenomStagiaire'] . '</td>';
            echo '<td>' . $stagiaire['dateNaisStagiaire'] . '</td>';
            echo '<td>' . $stagiaire['civiliteStagiaire'] . '</td>';
            echo '<td>' . $stagiaire['adressStagiaire'] . '</td>';
            echo '<td>' . $stagiaire['cpVille'] . '</td>';
            echo '<td>' . $stagiaire['nomVille'] . '</td>';
            echo '<td>' . $stagiaire['mailStagiaire'] . '</td>';
            echo '<td>' . $stagiaire['titreFormation'] . '</td>';
            echo '<td>' . $stagiaire['acronyme'] . '</td>';
            // TODO: afficher détails pour un étudiant grâce grâce à l'URL (GET)
            echo '<td>';
            echo   '<a href="stagiaire.php?id=' . $stagiaire['idStagiaire'] . '" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>';
            echo   '<a href="#" class="btn btn-outline-success"><i class="bi bi-pencil"></i></a>';
            echo   '<a href="#" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>';
            echo '</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>