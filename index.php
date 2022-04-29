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
                    <?php
                        if (isset($_SESSION['table'])){
                        echo '
                            <div class="d-grid gap-2">
                                <button name="home" class="btn btn-lg btn-outline-primary" type="button">Home</button>
                            </div> ';
                            include 'includes/ul.inc.php';
                        }
                    ?>
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
                            $_SESSION['table'] = $table;
                            echo '
                            <div class="alert alert-dark text-center" role="alert">
                                Données sauvegardées
                            </div>';    
                        }
                        else{
                            echo '<a role="button" class="btn btn-primary btn-lg" href="index.php?add">Ajouter des données</a>';
                        }
                        if (isset($_SESSION['table']) AND isset($_GET['home'])){
                            include 'includes/ul.inc.php';                           
                            print_r($table);
                            print_r($_SESSION['table']);
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
