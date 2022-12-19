<?php

require_once 'DBConnect.php';

$nom = htmlentities($_POST['nom'], ENT_QUOTES);
$prenom = htmlentities($_POST['prenom'], ENT_QUOTES);
$naissance = htmlentities($_POST['naissance'], ENT_QUOTES);
$civilite = htmlentities($_POST['civilite'], ENT_QUOTES);
$adresse = htmlentities($_POST['adresse'], ENT_QUOTES);
$ville = htmlentities($_POST['ville'], ENT_QUOTES);
$mail = htmlentities($_POST['mail'], ENT_QUOTES);
$formation = htmlentities($_POST['formation'], ENT_QUOTES);

/* 
if (isset($_POST['update'])) {
  echo '<h2>J\'ai été appelé depuis la page update.php. 😋</h2>';
} else if (isset($_POST['create'])) {
  echo '<h2>J\'ai été appelé depuis la page create.php. 🤪</h2>';
}
 */

/* INSERTION */
/* Exécute une requête préparée en liant des variables et valeurs */
$create = 'INSERT INTO t_stagiaire (nomStagiaire, prenomStagiaire, dateNaisStagiaire, civiliteStagiaire, adressStagiaire, idVille, mailStagiaire, idFormation) VALUES(:nom, :prenom, :naissance, :civilite, :adresse, :idville, :mail, :idformation)';

/* MISE A JOUR */
$id = htmlspecialchars($_POST['idStagiaire']);
$update = "
  UPDATE t_stagiaire
  SET nomStagiaire=:nom , prenomStagiaire=:prenom, dateNaisStagiaire=:naissance,
  civiliteStagiaire=:civilite, adressStagiaire=:adresse, idVille=:idville,
  mailStagiaire=:mail, idFormation=:idformation
  WHERE idStagiaire=$id
";

// SELECTION de la requete appropriée

if (isset($_POST['update'])) {
  $sql = $update;
} else if (isset($_POST['create'])) {
  $sql = $create;
}

// PREPARATION de la requete

$stmt = $dbh->prepare($sql);

/*
PDOStatement::bindValue() va remplacer telle étiquette par telle valeur.
PDOStatement::bindParam() va remplacer telle étiquette par telle variable, dont la valeur pourra être modifiée avec le temps par PHP pour exécuter plusieurs fois une même requête préparée et avoir des résultats différents à chaque fois.
*/

$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$stmt->bindParam(':naissance', $naissance, PDO::PARAM_STR);
$stmt->bindParam(':civilite', $civilite, PDO::PARAM_STR);
$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$stmt->bindParam(':idville', $ville, PDO::PARAM_INT);
$stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
$stmt->bindParam(':idformation', $formation, PDO::PARAM_INT);

$stmt->execute();

header('Location: list.php');
exit();