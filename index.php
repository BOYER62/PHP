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
            $user_agent = $_SERVER["HTTP_USER_AGENT"];
            if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
            {
                // echo "mobile device detected";
            }
            else{
                // echo "mobile device not detected";
                include 'includes/header.inc.html';
                }
            
        ?>

        <div class="container">
            <?php
                $user_agent = $_SERVER["HTTP_USER_AGENT"];
                if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
                {
                    // echo "mobile device detected";
                    echo '<div class="column">';
                }
                else{
                    // echo "mobile device not detected";
                    echo '<div class="row">';
                }
            ?>
                
                        <?php
                            $user_agent = $_SERVER["HTTP_USER_AGENT"];
                            if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
                            {
                                // echo "mobile device detected";
                                echo '<div class="col-12">';
                                echo '<div class="d-grid gap-2">';
                                echo '<a href="index.php" name="home" class="btn btn-lg btn-outline-primary" role="button">Home</a>';
                            }
                            else{
                                // echo "mobile device not detected";
                                echo '<div class="col-3">';
                                echo '<div class="d-grid gap-2">';
                                echo '<a href="index.php" name="home" class="btn btn-lg btn-outline-primary" role="button">Home</a>';
                            }
                        ?>
                        
                    </div>
                    <?php
                        if (isset($table)){                        
                            include 'includes/ul.inc.php';
                        }
                    ?>
                </div>
                <?php
                    $user_agent = $_SERVER["HTTP_USER_AGENT"];
                    if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
                    {
                        // echo "mobile device detected";
                        echo '<section class="col-12">';
                    }
                    else{
                        // echo "mobile device not detected";
                        echo '<section class="col-9">';
                    }
                ?>            
                
                    <?php
                        if(isset($_GET['add'])){
                            include "includes/form.inc.html";
                            echo '
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" name="enregistrer" class="btn btn-primary btn-lg">Enregistrer les données</button>
                                </div>';
                            echo'</form>';
                        }
                        elseif(isset($_POST['enregistrer'])){
                            $tabExtension = explode('.', $table['img']['name']);
                            $extension = strtolower(end($tabExtension));
                            //Tableau des extensions que l'on accepte
                            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                            print_r($table['img']['tmp_name']);
                            print_r($table['img']['name']);
                            if(in_array($extension, $extensions)){
                                move_uploaded_file($table['img']['tmp_name'], './uploaded/'.$table['img']['name']);
                            }
                            else{
                                echo '
                                <div class="alert alert-warning text-center" role="alert">
                                    Extention'.' '.$extension.' non prise en charge
                                </div>';
                            }

                            if(in_array($extension, $extensions) && $table['img']['size'] <= 2000000){
                                move_uploaded_file($table['img']['tmp_name'], './uploaded/'.$table['img']['name']);
                            }
                            else{
                                echo '
                                <div class="alert alert-warning text-center" role="alert">
                                    La taille de l\'image doit être inférieure à 2Mo
                                </div>';
                            }
                            if(in_array($extension, $extensions) && $table['img']['size'] <= 2000000 && $table['img']['error'] == 0){
                                move_uploaded_file($table['img']['tmp_name'], './uploaded/'.$table['img']['name']);;   
                            }
                            else{
                                echo '
                                <div class="alert alert-warning text-center" role="alert">
                                    error : 1
                                </div>';
                            }
                            $prenom = $_POST['first_name'];
                            $nom = $_POST['last_name'];
                            $age = $_POST['age'];
                            $size = $_POST['size'];
                            $civility = $_POST['civility'];
                            $html = $_POST['html'];
                            $css = $_POST['css'];
                            $javascript = $_POST['javascript'];
                            $php = $_POST['php'];
                            $mysql = $_POST['mysql'];
                            $bootstrap = $_POST['bootstrap'];
                            $symfony = $_POST['symfony'];
                            $reac = $_POST['reac'];
                            $color = $_POST['color'];
                            $dob = $_POST['dob'];
                            $img = $_FILES['img'];
                            $table = array (
                            "first_name" => $prenom,
                            "last_name" => $nom,
                            "age" => $age,
                            "size" => $size,
                            "civility" => $civility,
                            "html" => $html,
                            "css" => $css,
                            "javascript" => $javascript,
                            "php" => $php,
                            "mysql" => $mysql,
                            "bootstrap" => $bootstrap,
                            "symfony" => $symfony,
                            "reac" => $reac,
                            "color" => $color,
                            "dob" => $dob,
                            "img" => $img,
                            );
                            $_SESSION['table'] = $table;
                            echo '
                            <div class="alert alert-success text-center" role="alert">
                                Données sauvegardées
                            </div>';    
                        }
                        elseif(isset($_GET['debogage'])){
                            echo '  <h2 class="text-center">Débogage</h2></br>
                                    <p>===>Lecture du tableau à l\'aide de la fonction print_r()</p>
                                    ';
                            echo '<pre>';
                            print_r($table);
                            echo '<pre>';
                        }
                        elseif(isset($_GET['concatenation'])){
                            echo ' <h2 class="text-center">Concaténation</h2></br>';
                            echo '<h3>===>Construction d\'une phrase avec le contenu du tableau</h3>'; 
                                $civility=$table['civility'];
                                $civility = ($civility == 'Femme') ? 'Mme' : 'M';
                                echo 
                                $civility.' '.$table['first_name'].' '.$table['last_name'];
                                echo "</br>";
                                echo
                                "j'ai".' '.$table['age'].' '.'ans et je mesure'.' '.$table['size'].'m';
                                echo "</br></br>";

                            echo '<h3>===>Construction d\'une phrase après MAJ du tableau</h3>';
                                $civility=$table['civility'];
                                $civility = ($civility == 'Femme') ? 'Mme' : 'M';
                                $table['first_name']=ucwords($table['first_name']);
                                $table['last_name']=strtoupper($table['last_name']);
                                echo 
                                $civility.' '.$table['first_name'].' '.$table['last_name'];
                                echo '</br>';
                                echo
                                "j'ai".' '.$table['age'].' '.'ans et je mesure'.' '.$table['size'].'m';
                                echo "</br></br>";

                            echo '<h3>===>Affichage d\'une virgule à la place du point pour la taille</h3>';
                                $civility=$table['civility'];
                                $civility = ($civility == "Femme") ? 'Mme' : 'M';
                                $table['size'] = str_replace('.',',',$table['size']);
                                echo 
                                $civility.' '.$table['first_name'].' '.$table['last_name'];
                                echo '</br>';
                                echo
                                "j'ai".' '.$table['age'].' '.'ans et je mesure'.' '.$table['size'].'m';
                        }
                        elseif(isset($_GET['boucle'])){
                            echo ' <h2 class="text-center">Boucle</h2></br>';
                            echo '<h3>===>Lecture du tableau à l\'aide d\'une boucle foreach()</h3>';
                            $ligne=0;
                            foreach ($table as $key => $value){
                                echo 'à la ligne n°'.' '.$ligne.' '.'correspont la clé'.' '.$key.' '.'et contient'.' '.$value.'<pre></pre>';
                                $ligne=$ligne+1;
                            }
                        }
                        elseif(isset($_GET['function'])){
                            echo ' <h2 class="text-center">Fonction</h2></br>';
                            function readTable($t){
                                $ligne=0;
                                foreach ($t as $key => $value){
                                    echo 'à la ligne n°'.' '.$ligne.' '.'correspont la clé'.' '.$key.' '.'et contient'.' '.$value.'<pre></pre>';
                                    $ligne=$ligne+1;
                                }
                            }
                            readTable($table);
                        }
                        elseif(isset($_GET['supprimer'])){
                            echo '
                            <div class="alert alert-danger text-center" role="alert">
                                Données supprimer
                            </div>';
                            session_unset();
                        }
                        elseif(isset($_GET['addmore'])){
                            include 'includes/form2.inc.php';
                        }
                        else{
                            
                            echo '<a role="button" class="btn btn-primary btn-lg me-2" href="index.php?add">Ajouter des données</a>';
                            
                            echo '<a role="button" class="btn btn-secondary btn-lg" href="index.php?addmore">Ajouter plus de données</a>';
                            
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
