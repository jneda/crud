<?php

require_once 'DBConnect.php';

if (!isset($_POST) || empty($_POST)) {
  die('Données invalides. 🤔');
}

var_dump($_POST);

$cityName = htmlentities($_POST['cityName']);
$zipCode = htmlentities($_POST['zipCode']);

$sql = '
  INSERT INTO t_ville (nomVille, cpVille)
  VALUES (:cityName, :zipCode)
';

$stmt = $dbh->prepare($sql);
$ok = $stmt->execute([
  'cityName' => $cityName,
  'zipCode' => $zipCode
]);

$dbh = null;

if (!$ok) {
  die("Erreur d'enregistrement dans la base de données. 😖");
}

header('Location: cities.php');
