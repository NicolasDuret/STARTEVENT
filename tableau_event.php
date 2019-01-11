<?php
$id=filter_input(INPUT_GET,"id");
$prenom= filter_input(INPUT_POST, "prenom");
$versement= filter_input(INPUT_POST, "versement");
$description= filter_input(INPUT_POST, "description");

require_once 'Config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . "dbname=" . Config::BASE, Config::USER, Config::MDP);
$r = $db->prepare("select * from personnes");
$r->execute;

$personne = $r->fetchAll();
?>

<?php include_once "header.php" ?>
    <!--ici on mettra le contenu des pages-->
    <h1>Startevent</h1>
    <table class="highlight">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Somme versée</th>
            <th>Ramène...</th>
            <th>Différence</th>
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
    <a href="ajouter_personne.php" class="btn-large">
        <i class="material-icons left">add_circle_outline</i>
        Ajouter une personne
    </a>
<?php include_once "footer.php" ?>