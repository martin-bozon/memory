<?php
$page_selected = 'historique';
    include 'traitement/php_historique.php';
    $auth = App::getAuth();
    $auth->restrict();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Historique</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>
    <main id="main_histo">
        <h2 class="mt-3" id="titre_histo">Voici ton palmarès de partie <?= $score_j["username"]?></h2>
        <section id="section_class">
            <section id="class_gen">            
                <h2 class="text-white">Classement général</h2>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>                        
                                <th class="score">Place</th>
                                <th class="score">Score</th>                      
                            </tr>
                        </thead>
                        <tbody>                       
                            <tr>
                                <td class="place"># <?= ($general["sup"] + 1) ?></td>
                                <td class="score"><?=$score_j["score_total"]?></td>
                            </tr>
                        </tbody>
                    </table>
            </section>
            <section id="class_last">
                <h2 class="text-white">Dernières parties</h2>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="score">                        
                                <th>Place</th>
                                <th>Score</th>       
                                <th>Temps</th>               
                                <th>Nombre de coups</th>
                                <th>Nombre de paires</th>
                            </tr>
                        </thead>
                        <tbody>   
                            <?php
                                for($i=0; $i<$nb_last_partie; $i++)                    
                                    {
                                        $class_last = $bdd->query('SELECT count(score) as place FROM score WHERE score>? AND nb_paires=?', [$last_partie[$i]["score"], $last_partie[$i]["nb_paires"]])->fetch(PDO::FETCH_ASSOC); 
                                        ?>
                                             <tr>
                                                <td class="place"># <?= $class_last["place"]+1 ?></td>
                                                <td class="score"><?= $last_partie[$i]["score"] ?></td>
                                                <td><?= $last_partie[$i]["temps"] ?></td>
                                                <td><?= $last_partie[$i]["nb_coups"] ?></td>
                                                <td><?= $last_partie[$i]["nb_paires"] ?></td>
                                            </tr>
                                        <?php
                                    }
                            ?>                           
                        </tbody>
                    </table>
            </section>
        </section>
        
        <section id="class_perso">
            <h2 class="text-white">Top 10 perso : en fonction du nombre paires</h2>
            <section id="table_perso">
                <section>
                    <form action="" method="POST">
                        <select name="paire_joueur" id="">
                            <?php                        
                                for($i=3; $i<=$nb_paire["nb_paire"] AND $i<=15; $i++)
                                    {
                                        ?>                            
                                            <option value="<?= $i ?>"
                                            <?php if(isset($_POST["paire_joueur"]) && $i == $_POST["paire_joueur"])
                                            {
                                                ?>
                                                selected
                                                <?php
                                            }
                                            ?>
                                            ><?= $i ?> paires</option>                                                             
                                        <?php
                                    }
                            ?>
                        </select>
                        <input type="submit" name="valid_top_paire" class="button">
                    </form>            
                </section>
                <section>
                    <?php
                        if(isset($_POST["valid_top_paire"], $_POST["paire_joueur"]) && !empty($top_paire_j))
                            {                                     
                                ?>
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Place</th>
                                            <th scope="col">Score</th>                                            
                                            <th scope="col">Nombre de coups</th>
                                            <th scope="col">Temps</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0; $i<$nb_score; $i++)
                                                {
                                                    //Permet de créer le classement par paire                                                   
                                                    $general_paire = $bdd->query('SELECT count(score) as place FROM score WHERE score>? AND nb_paires=?', [$top_paire_j[$i]["score"], $_POST["paire_joueur"]])->fetch(PDO::FETCH_ASSOC);                                                                                                                                                              
                                                    ?>
                                                        <tr>
                                                            <td class="place"># <?= ($general_paire["place"]+1) ?></td>
                                                            <td class="score"><?= $top_paire_j[$i]["score"]?></td>                                                                
                                                            <td><?= $top_paire_j[$i]["nb_coups"]?></td>
                                                            <td><?= number_format($top_paire_j[$i]["temps"], 3)?></td>
                                                        </tr>                                                
                                                    <?php
                                                }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        else if(isset($_POST["valid_top_paire"], $_POST["paire_joueur"]) && empty($top_paire_j))
                            {
                                ?>
                                    <p class="alert alert-warning">Il n'y a pas encore de score disponible</p>
                                <?php
                            }
                    ?>
                </section>
                
            </section>
        </section>
    </main>

    <?php include 'inc/footer.php';?>
</body>
</html>