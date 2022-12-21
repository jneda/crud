<?php

session_start();
var_dump($_SESSION);

$userAuthenticated = false;
if (!empty($_SESSION['user'])) {
    $userAuthenticated = true;
}

require_once 'DBConnect.php';

if (!isset($_GET) || empty($_GET)) {
  die('<p style="colore: red;">Identifiant manquant ! 🤬</p>');
}

$courseId = htmlspecialchars($_GET['id']);

$sql = '
  SELECT * FROM t_formation WHERE idFormation = :courseId
';

$stmt = $dbh->prepare($sql);
$ok = $stmt->execute([
  'courseId' => $courseId
]);

if (!$ok) {
  die('<p style="colore: red;">Erreur d\'accès à la base de données ! 🤬</p>');
}

$course = $stmt->fetch(PDO::FETCH_ASSOC);

// var_dump($course);

$courseName = htmlspecialchars($course['titreFormation']);
$courseCode = htmlspecialchars($course['acronyme']);

$dbh = null;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier une formation</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        Modifier une formation
      </h1>
      <a href="courses.php" class="btn btn-outline-info ms-auto link-light">Liste des formations</a>
      <?php if ($userAuthenticated) { ?>
        <a href="logout.php" class="btn btn-outline-info ms-auto link-light">Se déconnecter</a>
      <?php } else { ?>
        <a href="signin.php" class="btn btn-outline-info ms-auto link-light">S'inscrire</a>
        <a href="login.php" class="btn btn-outline-info ms-auto link-light">Se connecter</a>
      <?php } ?>
    </div>
  </header>
  <section class="container mt-5">
    <?php if (!empty($_SESSION['user'])) { ?>
      <div class="row">
        <p>Bonjour <b><?= $_SESSION['user']['login'] ?></b> !</p>
      </div>
    <?php } ?>
    <div class="row">
      <form action="updateCourseDb.php" method="POST" class="col-md-6 offset-md-3">
        <input type="hidden" name="courseId" value="<?= $courseId ?>">
        <div class="mb-3">
          <label for="courseName" class="form-label">Libellé</label>
          <input type="text" class="form-control" id="courseName" name="courseName" value="<?= htmlspecialchars_decode($courseName) ?>">
        </div>
        <div class="mb-3">
          <label for="courseCode" class="form-label">Acronyme</label>
          <input type="text" class="form-control" id="courseCode" name="courseCode" value="<?= htmlspecialchars_decode($courseCode) ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Modifier</button>
      </form>
    </div>
  </section>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>