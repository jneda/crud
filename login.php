<?php

session_start();
var_dump($_SESSION);

$userAuthenticated = false;
if (!empty($_SESSION['user'])) {
  $userAuthenticated = true;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Se connecter</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        Se connecter
      </h1>
      <a href="list.php" class="btn btn-outline-info ms-auto link-light">Retourner à la liste</a>
      <?php if ($userAuthenticated) { ?>
        <a href="logout.php" class="btn btn-outline-info ms-auto link-light">Se déconnecter</a>
      <?php } else { ?>
        <a href="signin.php" class="btn btn-outline-info ms-auto link-light">S'inscrire</a>
        <a href="login.php" class="btn btn-outline-info ms-auto link-light">Se connecter</a>
      <?php } ?>
    </div>
  </header>

  <?php
  // var_dump($_POST);

  function sanitizeInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $inputIsValid = false;

  if (!empty($_POST)) {
    $login = sanitizeInput($_POST['login']);
    $password = sanitizeInput($_POST['password']);

    // var_dump([$login, $password]);

    if (!empty($login) && !empty($password)) {
      $inputIsValid = true;
    }
  }

  // $inputIsValid = !empty($_POST) && !empty($_POST['login']) && !empty($_POST['password']);

  if ($inputIsValid) {

    require 'DBConnect.php';

    $sql = 'SELECT * FROM t_user WHERE t_user.login = :login;';

    $stmt = $dbh->prepare($sql);
    $ok = $stmt->execute([
      'login' => $login
    ]);

    // var_dump($ok);

    if (!$ok) {
      die('<p>Échec de la lecture dans la base de données. 😑</p>');
    }

    $userData = $stmt->fetch();
    // var_dump($userData);

    if (!$userData) {
      die('<p>Identifiant inconnu. 😑</p>');
    }

    $hash = sanitizeInput($userData['password']);
    // var_dump($hash);

    if (!password_verify($password, $hash)) {
      die('<p>Échec de l\'authentification. 😑</p>');
    } else {
      $_SESSION['user'] = [
        'id' => sanitizeInput($userData['id_user']),
        'login' => sanitizeInput($userData['login'])
      ];
      require 'success.php';
    }
  }

  ?>

  <section class="container mt-5">
    <?php if (!empty($_SESSION['user'])) { ?>
      <div class="row">
        <p>Bonjour <b><?= $_SESSION['user']['login'] ?></b> !</p>
      </div>
    <?php } ?>
    <div class="row">
      <form action="" method="POST" class="col-md-6 offset-md-3">
        <div class="mb-3">
          <label for="login" class="form-label">Identifiant</label>
          <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <!-- <div class="mb-3">
          <label for="passwordConfirm" class="form-label">Confirmer le mot de passe</label>
          <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm">
        </div> -->
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
      </form>
    </div>
  </section>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>