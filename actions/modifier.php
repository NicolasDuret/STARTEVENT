<?php
$titre=filter_input(INPUT_POST, "titre");
$description=filter_input(INPUT_POST, "description");
$versement=filter_input(INPUT_POST, "versement");
?>

<?php require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE, Config::USER, Config::MDP);

$r = $db->prepare("update event set titre=:titre");
$r->bindParam(":titre", $titre);
$r->execute();

$r = $db->prepare("update personnes set d=:titre");
$r->bindParam(":titre", $titre);
$r->execute();

