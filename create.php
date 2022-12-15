<!-- Contient le formulaire permettant d'entrer de nouvelles données -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter des stagiaires 😼</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Boostratp icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
    <div class="container-fluid d-flex align-items-center">
      <h1 class="d-flex align-items-center fs-4 text-white mb-0">
        Ajouter des stagiaires
      </h1>
    </div>
  </header>

  <div class="container my-5">
    <div class="row">
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="nomStagiaire" class="form-label">Nom du stagiaire</label>
          <input type="text" class="form-control" id="nomStagiaire" name="nomStagiaire">
        </div>
        <div class="mb-3">
          <label for="prenomStagiaire" class="form-label">Prénom du stagiaire</label>
          <input type="text" class="form-control" id="prenomStagiaire" name="prenomStagiaire">
        </div>

        <div class="mb-3">
          <p class="form-label">Date de naissance du stagiaire</p>
          <div class="row">
            <div class="col">
              <label for="jourNaissance" class="form-label">Jour</label>
              <input type="text" class="form-control" id="jourNaissance" name="jourNaissance">
            </div>
            <div class="col">
              <label for="moisNaissance" class="form-label">Mois</label>
              <input type="text" class="form-control" id="moisNaissance" name="moisNaissance">
            </div>
            <div class="col">
              <label for="anneeNaissance" class="form-label">Année</label>
              <input type="text" class="form-control" id="anneeNaissance" name="anneeNaissance">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="civiliteStagiaire" class="form-label">Civilité du stagiaire</label>
          <select name="civiliteStagiaire" id="civiliteStagiaire" class="form-select">
            <option value="" disabled></option>
            <option value="M.">M.</option>
            <option value="Mme">Mme</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="adressStagiaire" class="form-label">Adresse du stagiaire</label>
          <input type="text" class="form-control" id="adressStagiaire" name="adressStagiaire">
        </div>

        <div class="mb-3">
          <label for="idVille" class="form-label">Ville du stagiaire</label>
          <select name="idVille" id="idVille" class="form-select">
            <option value="" disabled></option>
            <option value=""></option>
            <option value=""></option>
          </select>
        </div>

        <div class="mb-3">
          <label for="mailStagiaire" class="form-label">Adresse email du stagiaire</label>
          <input type="email" class="form-control" id="mailStagiaire" name="mailStagiaire">
        </div>
        <div class="mb-3">
          <label for="idFormation" class="form-label">Formation du stagiaire</label>
          <select name="idFormation" id="idFormation" class="form-select">
            <option value="" disabled></option>
            <option value=""></option>
            <option value=""></option>
          </select>
        </div>

        <div class="mb-3">
          <button type="reset" class="btn btn-secondary">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>

</html>