<?php

require_once 'DBConnect.php';

if (!isset($_GET['id'])) {
  die('<p style="colore: red;">Identifiant manquant ! 🤬</p>');
} else {
  $id = htmlspecialchars($_GET['id']);
}

$sql = 'DELETE FROM t_formation WHERE idFormation=:id';
$stmt = $dbh->prepare($sql);
$stmt->execute([
  'id' => $id
]);

header('Location: courses.php');
