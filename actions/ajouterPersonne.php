<?php
$prenom= filter_input(INPUT_POST, "prenom");
$versement= filter_input(INPUT_POST, "versement");
$description= filter_input(INPUT_POST, "description");

require_once  '../Config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE
    , Config::USER, Config::MDP);

$r = $db->prepare("insert into personnes (prenom, description, versement) values(:prenom,:description,:versement)");
$r->bindParam(":prenom", $prenom);
$r->bindParam(":description", $description);
$r->bindParam(":versement", $versement);
$r->execute();

header('Location: ../tableau_event.php');