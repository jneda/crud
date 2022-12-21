<?php

session_start();
var_dump($_SESSION);

$userAuthenticated = false;
if (!empty($_SESSION['user'])) {
    $userAuthenticated = true;
}

require_once 'DBConnect.php';

// var_dump($_GET);

if (!isset($_GET) || empty($_GET)) {
  die('<p style="colore: red;">Identifiant manquant ! 🤬</p>');
}

$cityId = htmlentities($_GET['id']);

$sql = '
  SELECT * FROM t_ville WHERE idVille = :cityId;
';

$stmt = $dbh->prepare($sql);
$stmt->execute([
  'cityId' => $cityId
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

// var_dump($result);

$cityName = htmlentities($result['nomVille']);
$zipCode = htmlentities($result['cpVille']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier une ville</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        Modifier une ville
      </h1>
      <a href="cities.php" class="btn btn-outline-info ms-auto link-light">Liste des villes</a>
      <?php if ($userAuthenticated) { ?>
        <a href="logout.php" class="btn btn-outline-info ms-auto link-light">Se déconnecter</a>
      <?php } else { ?>
        <a href="signin.php" class="btn btn-outline-info ms-auto link-light">S'inscrire</a>
        <a href="login.php" class="btn btn-outline-info ms-auto link-light">Se connecter</a>
      <?php } ?>
    </div>
  </header>
  <?php if (!empty($_SESSION['user'])) { ?>
    <div class="row">
      <p>Bonjour <b><?= $_SESSION['user']['login'] ?></b> !</p>
    </div>
  <?php } ?>
  <section class="container mt-5">
    <div class="row">
      <form action="updateCityDb.php" method="POST" class="col-md-6 offset-md-3">
        <input type="hidden" name="cityId" value="<?= $cityId ?>">
        <div class="mb-3">
          <label for="cityName" class="form-label">Ville</label>
          <input type="text" class="form-control" id="cityName" name="cityName" value="<?= $cityName ?>">
        </div>
        <div class="mb-3">
          <label for="zipCode" class="form-label">Code postal</label>
          <input type="text" class="form-control" id="zipCode" name="zipCode" value="<?= $zipCode ?>">
        </div>
        <?php
        // et maintenant, fermez-la !
        $dbh = null;
        ?>
        <button type="submit" class="btn btn-primary" name="update">Modifier</button>
      </form>
    </div>
  </section>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>