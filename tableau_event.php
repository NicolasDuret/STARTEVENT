<?php include_once "header.php" ?>

<?php require_once 'Config.php'?>

<?php
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::USER, Config::MDP);

$r = $db -> prepare ("select prenom, versement, description from personnes");
$r->execute();
$lignes = $r->fetchAll();

$r2 = $db -> prepare ("select SUM(versement) as somme from personnes");
$r2->execute();
$resultat = $r2->fetch();

$r3 = $db-> prepare ("select AVG(versement) as moyenne from personnes");
$r3->execute();
$moyenne = $r3->fetch();

?>

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
        </tr>
    <?php } ?>
    <tr>
        <td>TOTAL</td>
        <td><?php echo $resultat["somme"] ?></td>
        <td><?php echo round($moyenne["moyenne"]) ?></td>

    </tr>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th>Diffirences</th>
    </tr>
    </thead>

    <tbody>
    <td>
        <tr>
            <?php
            foreach($lignes as $ligne{
                echo $difference=$ligne["versement"]-$moyenne["moyenne"];
            }
            ?>
        </tr>
    </td>
    </tbody>
</table>


<a href="ajouter_personne.php" class="btn-large">
    <i class="material-icons left">add_circle_outline</i>
    Ajouter une personne
</a>


<?php include_once "footer.php" ?>
