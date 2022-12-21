<?php

session_start();
var_dump($_SESSION);

require_once 'DBConnect.php';

if (!isset($_POST) || empty($_POST)) {
  die('Données invalides. 🤔');
}

var_dump($_POST);

$cityId = htmlspecialchars($_POST['cityId']);
$cityName = htmlspecialchars($_POST['cityName']);
$zipCode = htmlspecialchars($_POST['zipCode']);

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
