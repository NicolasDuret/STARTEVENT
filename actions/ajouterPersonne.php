<?php
$prenom= filter_input(INPUT_POST, "prenom");
$versement= filter_input(INPUT_POST, "versement");
$description= filter_input(INPUT_POST, "description");
$idEvent= filter_input(INPUT_POST, "id");

require_once  '../Config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::USER, Config::MDP);

$r = $db->prepare("insert into personnes (prenom, description, versement, idEvent) values(:prenom,:description,:versement, :idEvent)");
$r->bindParam(":prenom", $prenom);
$r->bindParam(":description", $description);
$r->bindParam(":versement", $versement);
$r->bindParam(":idEvent", $idEvent);
$r->execute();

header('Location: ../index.php');