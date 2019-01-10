<?php include_once "header.php" ?>

<h1>Créez votre évènement :</h1>

<form action="actions/creerEvent.php" method="post">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="titre" id="titre" class="validate" maxlength="50" required>
            <label for="titre">Nom de l'Event</label>
        </div>
        <div class="input-field col s12">
            <textarea id="description" name="description"
                      class="materialize-textarea"></textarea>
            <label for="description">Description</label>
        </div>
        <div class="input-field col s12">
            <a href="index.php" class="btn red left">Annuler</a>
            <input type="submit" value="OK" class="btn-large right">
        </div>
    </div>
</form>

<?php include_once "footer.php" ?>
