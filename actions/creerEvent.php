<?php
$id=filter_input(INPUT_POST, "id");
$titre=filter_input(INPUT_POST, "titre");
$description = filter_input(INPUT_POST, "description");

require_once '../Config.php';
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=". Config::BASE, Config::USER, Config::MDP);


$r = $db->prepare("insert into event (titre, description)"." values (:titre, :description)");
$r->bindParam(":titre", $titre);
$r->bindParam(":description", $description);

$r->execute();

// faire le lien avec tableau LEO
header('Location: ../ajouter_personne.php');
