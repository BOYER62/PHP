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
        <!-- affichage du header sur pc mais pas sur le telephone ------------------------------------------------------ -->
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
            // -----------------------------------------------------Formulaire-------------------------
            if(isset($_GET['add'])){
                echo '<p class="h1 text-center">
                    Ajouter des données
                    </p>';
                include "includes/form.inc.html";
                echo '
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="enregistrer" class="btn btn-primary btn-lg">Enregistrer les données</button>
                </div>';
                echo'</form>';
            }
            elseif(isset($_POST['enregistrer'])){
                            
                // --------------------------------------------Traitement des formulaires-------------
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
                $table = array_filter($table);

                $tabExtension = explode('.', $table['img']['name']);
                $extension = strtolower(end($tabExtension));
                //Tableau des extensions que l'on accepte
                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                $booleen = in_array($extension,$extensions,true);
                                
                // ---------------------------------------------------------traitement des erreurs--------
                switch(isset($table)){
                    case(isset($table['img']['name']) && $table['img']['error']==0 && $booleen==0):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            Extention'.' '.$extension.' non prise en charge
                        </div>';
                    break;
                    case(($table['img']['error']==0) && ($table['img']['size'] > 2000000)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            La taille de l\'image doit être inférieure à 2Mo
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==1)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini.
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==2)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==3)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            Le fichier n\'a été que partiellement téléchargé.
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==4)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            Aucun fichier n\'a été téléchargé.
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==6)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            Un dossier temporaire est manquant.
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==7)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            Échec de l\'écriture du fichier sur le disque.
                        </div>';
                    break;
                    case(isset($table['img']['error']) && ($table['img']['error'] ==8)):
                        echo '
                        <div class="alert alert-warning text-center" role="alert">
                            Une extension PHP a arrêté l\'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L\'examen du phpinfo() peut aider.
                        </div>';
                    break;
                    case(isset ($table['img']['tmp_name'])):
                        move_uploaded_file($_FILES['img']['tmp_name'], "./uploaded/".$_FILES['img']['name']);
                        echo '
                        <div class="alert alert-success text-center" role="alert">
                            Données sauvegardées
                        </div>';
                }
                if (!isset($_FILES['img'])){
                    echo '
                    <div class="alert alert-success text-center" role="alert">
                        Données sauvegardées
                    </div>';   
                } 
            }
            // ------------------------------------------------Debogage------------------------------------------------
            elseif(isset($_GET['debogage'])){
                echo '  <h2 class="text-center">Débogage</h2></br>
                    <p>===>Lecture du tableau à l\'aide de la fonction print_r()</p>';
                $table = array_filter($table);
                echo '<pre>';
                    print_r($table);
                echo '<pre>';
            }
            // --------------------------------------------------Concatenation----------------------------------------
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
                // -------------------------------------------------------Boucle-----------------------------------------
                elseif(isset($_GET['boucle'])){
                    echo ' <h2 class="text-center">Boucle</h2></br>';
                    echo '<h3>===>Lecture du tableau à l\'aide d\'une boucle foreach()</h3>';
                    $ligne=0;
                    $table = array_filter($table);
                    foreach ($table as $key => $value){
                        if($key=='img'){
                            echo 'à la ligne n°'.' '.$ligne.' '.'correspont la clé'.' '.$key.' '.'et contient';
                            break;
                        }
                        echo 'à la ligne n°'.' '.$ligne.' '.'correspont la clé'.' '.$key.' '.'et contient'.' '.$value.'<pre></pre>';
                        $ligne=$ligne+1;
                    }
                            
                    if ($table['img']['name']!=""){
                        echo '<figure>';
                        echo "<img w-100 src='uploaded/".$table['img']['name']."'>";
                        echo '</figure>';
                    }
                }
                // -------------------------------------------------------Fonction-----------------------------------------
                elseif(isset($_GET['function'])){
                    echo ' <h2 class="text-center">Fonction</h2></br>';
                    function readTable($t){
                        $ligne=0;
                        foreach ($t as $key => $value){
                            if($key=='img'){
                                echo 'à la ligne n°'.' '.$ligne.' '.'correspont la clé'.' '.$key.' '.'et contient';
                                break;
                            }
                            echo 'à la ligne n°'.' '.$ligne.' '.'correspont la clé'.' '.$key.' '.'et contient'.' '.$value.'<pre></pre>';
                            $ligne=$ligne+1;
                        }
                    }
                    $table = array_filter($table);  
                    readTable($table);
                    if ($table['img']['name'] !=""){
                        echo '<figure>';
                        echo "<img w-100 src='uploaded/".$table['img']['name']."'>";
                        echo '</figure>';
                    }
                }
                // -------------------------------------------------------Supprimer---------------------------------
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
    </body>
</html>
