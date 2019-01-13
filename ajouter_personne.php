<?php include_once "header.php" ?>
<?php $idEvent=filter_input(INPUT_GET,"id");?>

    <h1>Ajouter une personne</h1>
    <form class="col s12" action="actions/ajouterPersonne.php" method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="prenom" id="prenom" class="validate"
                       maxlength="50" required>
                <label for="prenom">Nom</label>
            </div>
            <div class="input-field col s12">
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <label for="description">Ce que vous amenez</label>
            </div>
            <div class="input-field col s12">
                <input type="number" id="versement" name="versement" class="materialize-textarea" max="250" required>
                <label for="versement">Argent</label>
            </div>
            <input type="hidden" value="<?php echo $idEvent ?>" name="id">


            <div class="input-field col s12">
                <a href="index.php" class="btn red left">Annuler</a>
                <input type="submit" value="OK" class="btn-large right" value="Enregistrer">
            </div>
        </div>
    </form>
<?php var_dump($idEvent); ?>
<?php include_once "footer.php" ?>