<?php $id=filter_input(INPUT_GET,"id");?>

<?php include_once "header.php" ?>

<?php require_once 'Config.php';?>

<?php
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::USER, Config::MDP);
$r = $db->prepare("select id, titre, description from event where id=:id");
$r->bindParam(":id",$id);
$r->execute();
$event = $r->fetch();

$r1 = $db -> prepare ("select * from personnes where idEvent=:idEvent");
$r1->bindParam(":idEvent",$id);
$r1->execute();
$lignes = $r1->fetchAll();

$r2 = $db -> prepare ("select SUM(versement) as somme, AVG(versement) as moyenne from personnes where idEvent=:idEvent");
$r2->bindParam(":idEvent",$id);
$r2->execute();
$resultats = $r2->fetch();

?>

    <h1>Event <?php echo $event["titre"]?></h1>
    <input type="hidden" value="<?php echo $id ?>" name="id">

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
                <?php
                $difference=$ligne["versement"]-$resultats["moyenne"];
                if($difference<0){?>
                    <td class="#ff3d00 deep-orange accent-3"><b><?php echo round($difference=$ligne["versement"]-$resultats["moyenne"]) ?></b></td>
                <?php }
                else { ?>
                    <td class="#4caf50 green"><b><?php echo round($difference=$ligne["versement"]-$resultats["moyenne"]) ?></b></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table><br>

    <table>

        <tr class="#cfd8dc blue-grey lighten-4">
            <td><b>TOTAL<?php echo $resultats["somme"] ?></b></td>
        </tr>
    </table>

    <a href="ajouter_personne.php?id=<?php echo  $event["id"] ?>" class="btn-large">
        <i class="material-icons right">add_circle_outline</i>
        Ajouter une personne
    </a>

<?php include_once "footer.php" ?>