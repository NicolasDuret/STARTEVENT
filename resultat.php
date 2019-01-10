<?php
$id=filter_input(INPUT_GET,"id");

require_once 'Config.php';

$db=new PDO("mysql:host=" . Config::SERVEUR . "dbname=" . Config::BASE, Config::USER, Config::MDP);
$r = $db->prepare("select * from personnes");
$r->execute;

$personne = $r->fetchAll();
?>

<?php include_once "header.php" ?>

<h1>Réccap de l'Event :</h1>

<table class="highlight">
    <thead>
    <tr>
        <th>Prénom</th>
        <th>Somme versée</th>
        <th>Description</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td><?php echo $personne["prenom"]?></td>
        <td><?php echo $personne["versement"]?></td>
        <td><?php echo $personne["description"]?></td>
        <td><?php echo $personne["difference"]?></td>
    </tr>
    <tr>
        <td>TOTAL</td>
        <td></td>
        <td><?php echo $event["total"]?></td>
    </tr>

    </tbody>
</table>
