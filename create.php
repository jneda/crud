<?php
require_once 'DBConnect.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des stagiaires</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
        <div class="container-fluid d-flex align-items-center">
            <h1 class="d-flex align-items-center fs-4 text-white mb-0">
                Liste des stagiaires
            </h1>
            <a href="list.php" class="btn btn-outline-info ms-auto link-light">Retourner à la liste</a>
            <a href="signin.php" class="btn btn-outline-info ms-auto link-light">S'inscrire</a>
            <a href="login.php" class="btn btn-outline-info ms-auto link-light">Se connecter</a>
        </div>
    </header>
    <section class="container mt-5">
        <div class="row">
            <form action="traitement.php" method="POST" class="col-md-6 offset-md-3">
                <div class="mb-3">
                    <label for="InputNom" class="form-label">Nom du stagiaire</label>
                    <input type="text" class="form-control" id="InputNom" name="nom">
                </div>
                <div class="mb-3">
                    <label for="InputPrenom" class="form-label">Prénom du stagiaire</label>
                    <input type="text" class="form-control" id="InputPrenom" name="prenom">
                </div>
                <div class="mb-3">
                    <label for="DateNaissance" class="form-label">Date de Naissance du stagiaire</label>
                    <input type="text" class="form-control" id="DateNaissance" name="naissance" placeholder="YYYY-MM-DD" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])">
                </div>
                <div class="mb-3">
                    <label for="civilité" class="form-label">Choisir la civilité</label>
                    <select class="form-select" name="civilite" aria-label="civilité">
                        <option value="Mme">Madame</option>
                        <option value="M.">Monsieur</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Adresse" class="form-label">Adresse du stagiaire</label>
                    <input type="text" class="form-control" id="Adresse" name="adresse">
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Choisir la ville</label>
                    <?php
                    $villes = $dbh->query('SELECT * from t_ville');
                    ?>
                    <select class="form-select" name="ville" aria-label="ville">
                        <option selected>...</option>
                        <?php
                        foreach ($villes as $ville) {
                            echo '<option value=' . $ville['idVille'] . '>' . $ville['nomVille'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">Email du stagiaire</label>
                    <input type="email" class="form-control" id="mail" name="mail">
                </div>
                <div class="mb-3">
                    <label for="formation" class="form-label">Choisir la formation</label>
                    <?php
                    $formations = $dbh->query('SELECT * from t_formation');
                    ?>
                    <select class="form-select" name="formation" aria-label="formation">
                        <option selected>...</option>
                        <?php
                        foreach ($formations as $formation) {
                            echo '<option value=' . $formation['idFormation'] . '>' . $formation['titreFormation'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <?php
                // et maintenant, fermez-la !
                $dbh = null;
                ?>
                <button type="submit" class="btn btn-primary" name="create">Créer</button>
            </form>
        </div>
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>