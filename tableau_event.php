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

    <h1>Event : <?php echo $event["titre"]?></h1>
    <input type="hidden" value="<?php echo $id ?>" name="id">

    <table class="highlight">
        <thead>
        <tr>
            <th class="center">Prénom<br><i class="material-icons">person_outline</i></th>
            <th class="center">Somme versée</br><i class="material-icons">euro_symbol</i></th>
            <th class="center">Ramène...</br><i class="material-icons">local_grocery_store</i></th>
            <th class="center">Différence</br><i class="material-icons">remove</i></th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($lignes as $ligne){
            ?>
            <tr>
                <td class="center"><?php echo $ligne["prenom"]?></td>
                <td class="center"><?php echo $ligne["versement"]?></td>
                <td class="center"><?php echo $ligne["description"]?></td>
                <?php
                $difference=$ligne["versement"]-$resultats["moyenne"];
                if($difference<0){?>
                    <td class="#ff3d00 deep-orange accent-3 center"><b><?php echo round($difference=$ligne["versement"]-$resultats["moyenne"]) ?></b></td>
                <?php }
                else { ?>
                    <td class="#4caf50 green center"><b><?php echo round($difference=$ligne["versement"]-$resultats["moyenne"]) ?></b></td>
                <?php } ?>
            </tr>
        <?php } ?>
        <tr class="#cfd8dc blue-grey lighten-4">
            <td><b>TOTAL</b></td>
            <td class="center"><b><?php echo $resultats["somme"] ?>  €</b></td>
        </tr>
        </tbody>
    </table><br>

    <table>


    </table></br></br>

    <a href="ajouter_personne.php?id=<?php echo  $event["id"] ?>" class="btn-large #b71c1c red darken-4">
        <i class="material-icons right">group_add</i>
        Ajouter une personne
    </a>

<?php include_once "footer.php" ?>