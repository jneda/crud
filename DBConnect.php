<?php

$dsn = 'mysql:host=localhost;dbname=crud';
$user = 'root';
$pass = '';
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
];

try {
  $dbh = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  print 'Erreur : ' . $e->getMessage() . '<br/>';
  die();
}
