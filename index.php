<?php include_once "header.php" ?>

<?php require_once 'Config.php'?>

<?php
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::USER, Config::MDP);

$r = $db -> prepare ("select id, titre, description,
(select count(id)
from personnes p
where p.idEvent=e.id) as nbPersonne,
(select sum(versement)
from personnes p
where p.idEvent=e.id) as frais
from Event e");
$r->execute();
$resultats = $r->fetchAll();
?>

<h1>Bienvenue sur StartEvent</h1>
<?php foreach($resultats as $resultat){
    ?>
    <ul class="collection">
        <li class="collection-item avatar">
            <i class="material-icons circle">toys</i>
            <span class="title"><b><?php echo $resultat["titre"] ?></b> - <?php echo $resultat["description"] ?></span></br>
            </br>Nombre de participants : <b><?php echo $resultat["nbPersonne"] ?></b></br>
            Total de la cagnotte : <b><?php echo $resultat["frais"] ?> €</b></br>
            <a href="tableau_event.php?id=<?php echo $resultat["id"]?>" class="secondary-content"><i class="material-icons">camera</i></a>
        </li>
    </ul>
<?php } ?>

<a href="creer_event.php" class="btn-large">
    <i class="material-icons left">add_circle_outline</i>
    Créez votre évènement...
</a>

<?php include_once "footer.php" ?>
