<?php
    include 'traitement/php_historique.php';
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
        <?php //include 'inc/header.php'; ?>
    </header>
    <main id="main_histo">
        <h2>Voici ton historique de partie <?= $score_j["username"]?></h2>
        <section id="class_gen">
            <h2>Classement général - Cumul des points</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>                        
                            <th class="border">Place</th>
                            <th class="border">Score</th>                      
                        </tr>
                    </thead>
                    <tbody>                       
                        <tr>
                            <td class="border"># <?= ($general["sup"] + 1) ?></td>
                            <td class="border"><?=$score_j["score_total"]?></td>
                        </tr>
                    </tbody>
                </table>
        </section>
        <section id="class_perso">
            <h2>Top 10 perso + classement en fonction des paires</h2>
            <section id="table_perso">
                <section>
                    <form action="" method="POST">
                        <select name="paire_joueur" id="">
                            <?php
                                for($i=3; $i<=$nb_paire["nb_paire"]; $i++)
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
                        <input type="submit" name="valid_top_paire" class="btn btn-primary">
                    </form>            
                </section>
                <section>
                    <?php
                        if(isset($_POST["valid_top_paire"], $_POST["paire_joueur"]) && !empty($top_paire_j))
                            {                                     
                                ?>
                                <table class="table table-dark">
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
                                                    $prepare_general_paire = $bdd->prepare('SELECT count(score) as place FROM score WHERE score>? AND nb_paires=?');
                                                    $prepare_general_paire->execute([$top_paire_j[$i]["score"], $_POST["paire_joueur"]]);
                                                    $general_paire = $prepare_general_paire->fetch(PDO::FETCH_ASSOC);                                                                                                                                                                      
                                                    ?>
                                                        <tr>
                                                            <td># <?= ($general_paire["place"]+1) ?></td>
                                                            <td><?= $top_paire_j[$i]["score"]?></td>                                                                
                                                            <td><?= $top_paire_j[$i]["coups"]?></td>
                                                            <td><?= $top_paire_j[$i]["temps"]?></td>
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