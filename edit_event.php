<?php include_once "header.php" ?>

<?php require_once 'Config.php'?>
<?php
$db = new PDO("mysql:host=".Config::SERVEUR .";dbname=".Config::BASE, Config::USER, Config::MDP);
$r = $db->prepare("select description, versement from personnes");
$r -> execute();
$personnes = $r -> fetchAll();

$db = new PDO("mysql:host=".Config::SERVEUR .";dbname=".Config::BASE, Config::USER, Config::MDP);
$r2 = $db->prepare("select titre from event");
$r2 -> execute();
$event = $r2 -> fetch();
?>
    <h1>Modifier l'Event : <?php echo $event["titre"]?></h1>
    <div class="row">
        <form action="actions/editEvent.php" method="post">
            <div class="input-field col s12">
                <input type="text" name="titre" id="titre" class="validate" maxlength="50" required value="<?php echo htmlspecialchars($event["titre"])?>">
                <label for="titre">Nom de l'Event</label>
            </div>
            <div class="input-field col s12">
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <?php echo htmlspecialchars($personnes["description"])?>
                <label for="description">Ce que vous amenez...</label>
            </div>
            <div class="input-field col s12">
                <textarea id="versement" name="versement" class="materialize-textarea"></textarea>
                <?php echo htmlspecialchars($personnes["versement"])?>
                <label for="versement">Somme    ( € )</label>
            </div>
            <a href="tableau_event.php" class="btn red left">Annuler</a>
            <input type="submit" value="OK" class="btn-large right">
        </form>
    </div>

<?php include_once  "footer.php" ?>