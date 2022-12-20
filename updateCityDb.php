<?php

require_once 'DBConnect.php';

if (!isset($_POST) || empty($_POST)) {
  die('Données invalides. 🤔');
}

var_dump($_POST);

$cityId = htmlentities($_POST['cityId']);
$cityName = htmlentities($_POST['cityName']);
$zipCode = htmlentities($_POST['zipCode']);

$sql = '
  UPDATE t_ville
  SET nomVille = :cityName, cpVille = :zipCode
  WHERE idVille = :cityId
';

$stmt = $dbh->prepare($sql);
$ok = $stmt->execute([
  'cityName' => $cityName,
  'zipCode' => $zipCode,
  'cityId' => $cityId
]);

$dbh = null;

if (!$ok) {
  die("Erreur de mise à jour dans la base de données. 😖");
}

header('Location: cities.php');
