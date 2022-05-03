<div class="row">
    <p class="h1 text-center">
        Ajouter plus de données
    </p>
    <div class="card col-md-7 mx-auto my-1">
        <?php
            include 'includes/form.inc.html';
        ?>
    </div>
    <div class="card col-md-4 mx-auto my-1>
        <fieldset class="form-group">
            <legend class="mt-4">Connaissance</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="html" value="html" id="html">
                <label class="form-check-label" for="html">
                    HTML
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="css" value="css" id="css">
                <label class="form-check-label" for="css">
                    CSS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="javascript" value="javascript" id="javascript">
                <label class="form-check-label" for="javascript">
                    JavaScript
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="php" value="php" id="php">
                <label class="form-check-label" for="php">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="mysql" value="mysql" id="mysql">
                <label class="form-check-label" for="mysql">
                    MySQL
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="bootstrap" value="bootstrap" id="bootstrap">
                <label class="form-check-label" for="bootstrap">
                    Bootstrap
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="symfony" value="symfony" id="symfony">
                <label class="form-check-label" for="symfony">
                    Symfony
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reac" value="reac" id="reac">
                <label class="form-check-label" for="reac">
                    Reac
                </label>
            </div>
        </fieldset>
        <label for="exampleColorInput" class="form-label">Couleur Préférée</label>
        <input type="color" class="form-control form-control-color" id="color" value="color" name="color"  title="Choose your color" required>
        <label for="dob">Date de naissance</label>

        <input type="date" id="dob"
            name="dob" value="dob" 
            min="1975-01-01T00:00" required>

        
    </div>
    <div class="card col-11 mx-auto my-1">
        <label for="img" class="form-label">Joindre une image(jpg ou png)</label>
        <input class="form-control" type="file" name="img" id="img" required>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="enregistrer" class="btn btn-primary btn-lg">Enregistrer les données</button>
        </div>
    </div>
</div>
</form>
    