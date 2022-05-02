<div class="row">
    <div class="card col-md-7 mx-auto my-1">
        <?php
            include 'includes/form.inc.html';
        ?>
    </div>
    <div class="card col-md-4 mx-auto my-1>
        <fieldset class="form-group">
            <legend class="mt-4">Connaissance</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="html" value="" id="HTML">
                <label class="form-check-label" for="HTML">
                    HTML
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="css" value="" id="CSS">
                <label class="form-check-label" for="CSS">
                    CSS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="javascript" value="" id="JavaScript">
                <label class="form-check-label" for="JavaScript">
                    JavaScript
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="php" value="" id="PHP">
                <label class="form-check-label" for="PHP">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="mysql" value="" id="MySQL">
                <label class="form-check-label" for="MySQL">
                    MySQL
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="bootstrap" value="" id="Bootstrap">
                <label class="form-check-label" for="Bootstrap">
                    Bootstrap
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="symfony" value="" id="Symfony">
                <label class="form-check-label" for="Symfony">
                    Symfony
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reac" value="" id="Reac">
                <label class="form-check-label" for="Reac">
                    Reac
                </label>
            </div>
        </fieldset>
        <label for="exampleColorInput" class="form-label">Couleur Préférée</label>
        <input type="color" class="form-control form-control-color" id="exampleColorInput" name="color" value="#563d7c" title="Choose your color">
        <label for="meeting-time">Date de naissance</label>

        <input type="datetime-local" id="meeting-time"
            name="dob" value="2018-06-12T19:30"
            min="2018-06-07T00:00" max="2018-06-14T00:00">

        <div class="card col-11 mx-auto my-1">
            <label for="formFile" class="form-label">Joindre une image(jpg ou png)</label>
            <input class="form-control" type="file" name="img" id="formFile">
        </div>
    </div>
</div>
</form>
    