<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <?php
        include 'includes/head.inc.html';
    ?>

    <body>
        <?php
            include 'includes/header.inc.html';
        ?>

        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="d-grid gap-2">
                        <button class="btn btn-lg btn-outline-primary" type="button">Home</button>
                    </div>
                </div>

                <section class="col-9">
                    <?php
                        if(isset($_GET['add'])){
                            include "includes/form.inc.html";
                        }
                        elseif(isset($_POST['enregistrer'])){
                            $prenom = $_POST['first_name'];
                            $nom = $_POST['last_name'];
                            $age = $_POST['age'];
                            $size = $_POST['size'];
                            $civility = $_POST['civility'];
                            $table = array (
                            "first_name" => $prenom,
                            "last_name" => $nom,
                            "age" => $age,
                            "size" => $size,
                            "civility" => $civility,
                            );
                        }
                        else{
                            echo '<a role="button" class="btn btn-primary btn-lg" href="index.php?add">Ajouter des données</a>';
                        }
                    ?>
                </section>
            </div>
            
            <?php
                include 'includes/footer.inc.html';
            ?>
        </div>
    </body>
</html>
