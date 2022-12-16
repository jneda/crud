<?php

require_once 'DBConnect.php';

if (isset($_GET) && !empty($_GET)) {
  // echo 'Id stagiaire : ' . $_GET['id'];
  $idStagiaire = (int) $_GET['id'];
}

$query = $dbh->prepare('
  SELECT * FROM t_stagiaire AS S
  JOIN t_ville as V ON V.idVille = S.idVille
  JOIN t_formation as F ON F.idFormation = S.idFormation
  WHERE S.idStagiaire = ?
');
$query->execute([$idStagiaire]);
$stagiaire = $query->fetch(PDO::FETCH_ASSOC);
// var_dump($stagiaire);
extract($stagiaire);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informations du stagiaire 😼</title>
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
        Informations du stagiaire
      </h1>
    </div>
    <a href="create.php" class="btn btn-outline-info ms-auto link-light">Créer un stagiaire</a>
  </header>

  <div class="container mt-5">
    <div class="row">
      <h1><?= sprintf('%s %s %s', $civiliteStagiaire, $nomStagiaire, $prenomStagiaire) ?></h1>
      <p><?= sprintf('Formation : %s (%s)', $titreFormation, $acronyme) ?></p>
      <p><?= sprintf('Date de naissance : %s', $dateNaisStagiaire) ?></p>
      <p><?= sprintf('Email : %s', $mailStagiaire) ?></p>
      <p><?= sprintf('Adresse : %s %s %s', $adressStagiaire, $cpVille, $nomVille) ?></p>
    </div>
    <div class="mb-3">
      <a href="list.php" class="btn btn-primary">&laquo; Retour</a>
    </div>
  </div>
</body>

</html>

<?php

// fermeture de la connection à la BDD
$dbh = null;
