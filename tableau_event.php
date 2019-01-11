<?php include_once "header.php" ?>

<?php
require_once 'Config.php'

$db = new PDO("mysql:host=" . Config::SERVEUR . "dbname=" . Config::BASE, Config::USER, Config::MDP);
$r = $db -> prepare ("select prenom, versement, difference from personnes");
$r->execute();

$personne = $r->fetchAll();
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a href="ajouter_personne.php" class="btn-large">
    <i class="material-icons left">add_circle_outline</i>
    Ajouter une personne
</a>


<?php include_once "footer.php" ?>
