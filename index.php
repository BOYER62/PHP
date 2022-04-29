<?php
    session_start();
    if (isset($_SESSION['table'])){
    $table = $_SESSION['table'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <?php
        include 'includes/head.inc.html';
    ?>

    <body>
            <?php
            include 'includes/header.inc.html';
        //     
        // } 

            ?>

        <div class="container">
            <div class="row">
                <div class="col-3">
                <div class="d-grid gap-2">
                                <a href="index.php" name="home" class="btn btn-lg btn-outline-primary" role="button">Home</a>
                            </div>
                    <?php
                        if (isset($table)){                        
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
                        elseif(isset($_GET['debogage'])){
                            echo '  <h1 class="text-center">Débogage</h1>
                                    <p>===>Lecture du tableau à l\'aide de la fonction print_r()</p>
                                    ';
                        }
                        elseif(isset($_GET['concatenation'])){
                            echo ' <h1 class="text-center">Concaténation</h1>';
                        }
                        else{
                            echo '<a role="button" class="btn btn-primary btn-lg" href="index.php?add">Ajouter des données</a>';
                        }
                        
                        
                    ?>

                    <?php
                        if (isset($_GET['supprimer'])){
                        session_unset();
                        }
                        if (isset($_GET['debogage'])){
                            
                            echo '<pre>';
                            print_r($table);
                            echo '<pre>';
                        }
                        if (isset($_GET['concatenation'])){
                            print_r($table);
                            echo '<pre>
                                <p>===>Construction d\'une phrase avec le contenu du tableau</p>
                                </pre>'; 
                                $civility = $civility = 'Homme' ? 'M' : 'Mme';
                                echo $civility.' '.$table['first_name'].' '.$table['last_name'];
                                echo "j'ai".' '.$table['age'].' '.'ans et je mesure'.' '.$table['size'].'m';
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
