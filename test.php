<?php include_once "header.php" ?>

<?php
require_once 'Config.php';
$db = new PDO("mysql:host=" . Config::SERVEUR . "dbname=" . Config::BASE, Config::USER, Config::MDP);
$r = $db->prepare("select * from personnes");
$r->execute;

$lignes = $r->fetchAll();
?>

<?php include_once "header.php" ?>

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
        <?php
        foreach($lignes as $ligne){
            ?>
            <tr>
                <td><?php echo $ligne["prenom"]?></td>
                <td><?php echo $ligne["versement"]?></td>
                <td><?php echo $ligne["description"]?></td>
                <td><?php echo $ligne["difference"]?></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <td></td>
                <td><?php echo $event["total"]?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="ajouter_personne.php" class="btn-large">
        <i class="material-icons left">add_circle_outline</i>
        Ajouter une personne
    </a>
<?php include_once "footer.php" ?>