<?php

session_start();
var_dump($_SESSION);

require_once 'DBConnect.php';

if (!isset($_POST) || empty($_POST)) {
  die('Données invalides. 🤔');
}

var_dump($_POST);

$courseId = htmlspecialchars($_POST['cityId']);
$courseName = htmlspecialchars($_POST['courseName']);
$courseCode = htmlspecialchars($_POST['courseCode']);

$sql = '
  UPDATE t_formation
  SET titreFormation = :courseName, acronyme = :courseCode
  WHERE idFormation = :courseId
';

$stmt = $dbh->prepare($sql);
$ok = $stmt->execute([
  'courseName' => $courseName,
  'courseCode' => $courseCode,
  'courseId' => $courseId
]);

$dbh = null;

if (!$ok) {
  die("Erreur de mise à jour dans la base de données. 😖");
}

header('Location: courses.php');
