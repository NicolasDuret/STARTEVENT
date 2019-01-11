<?php include_once "header.php" ?>

    <h1>Ajouter une personne</h1>
    <div class="row">
        <form action="actions/ajouterPersonne.php" method="post">
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
                <textarea id="versement" name="versement" class="materialize-textarea"></textarea>
                <label for="versement">Argent</label>
            </div>
            <a href="tableau_event.php" class="btn red left">Annuler</a>
            <input type="submit" value="OK" class="btn-large right">
        </form>
    </div>

<?php include_once  "footer.php" ?>