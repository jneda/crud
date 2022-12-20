<?php

require_once 'DBConnect.php';

if (!isset($_POST) || empty($_POST)) {
  die('Données invalides. 🤔');
}

$courseName = htmlspecialchars($_POST['courseName']);
$courseCode = htmlspecialchars($_POST['courseCode']);

// var_dump([$courseName, $courseCode]);

$sql = '
  INSERT INTO t_formation (titreFormation, acronyme)
  VALUES (:courseName, :courseCode)
';

$stmt = $dbh->prepare($sql);
$ok = $stmt->execute([
  'courseName' => $courseName,
  'courseCode' => $courseCode
]);

$dbh = null;

if (!$ok) {
  die("Erreur d'enregistrement dans la base de données. 😖");
}

header('Location: courses.php');