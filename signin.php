<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S'enregistrer</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        S'enregistrer
      </h1>
      <a href="list.php" class="btn btn-outline-info ms-auto link-light">Retourner à la liste</a>
      <!-- <a href="signin.php" class="btn btn-outline-info ms-auto link-light">S'inscrire</a> -->
      <!-- <a href="login.php" class="btn btn-outline-info ms-auto link-light">Se connecter</a> -->
    </div>
  </header>
  <section class="container mt-5">
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
        <?php
        // et maintenant, fermez-la !
        $dbh = null;
        ?>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary" name="signin">S'enregistrer</button>
        </div>
      </form>
    </div>
  </section>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>