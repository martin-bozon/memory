<?php    
    include 'traitement/php_fame.php';       
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
    <title>Wall of Fame</title>
</head>
<body>
    <header>
        <?php include 'inc/header.php'; ?>
    </header>    
    <main id="main_fame">      
        <section id="top_gen">
            <table class="table table-dark top">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="3">TOP 10 : Joueur</th>                
                    </tr>
                </thead>
                <tbody>
                    <tr class="titre_top">
                        <td>Place</td>
                        <td>Nom</td>
                        <td>Score</td>                    
                    </tr>   
                    <?php                
                        for($i=0; $i<$nb_score; $i++)
                            {
                                ?>
                                <tr>
                                    <td class="border"># <?= ($i+1)?></td>
                                    <td class="border"><?=$top_gen[$i]['username']?></td>
                                    <td class="border"><?=$top_gen[$i]['score_total']?></td>                                                    
                                <?php
                            }                                        
                    ?>
                </tbody>
            </table>    
            <table class="table table-dark top">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="6">TOP 10 : C'est super</th>                
                    </tr>
                </thead>
                <tbody>
                    <tr class="titre_top"> 
                        <td>Place</td>                   
                        <td>Nom</td>
                        <td>Score</td>       
                        <td>Nombre de paires</td>     
                        <td>Temps</td>        
                        <td>Nombre de coups</td>
                    </tr>   
                    <?php                
                        for($i=0; $i<$nb_top_10; $i++)
                            {
                                ?>
                                <tr>       
                                    <td class="border"># <?= ($i+1)?></td>                     
                                    <td class="border"><?= $top_10[$i]["username"] ?></td>
                                    <td class="border"><?= $top_10[$i]["score"] ?></td>   
                                    <td class="border"><?= $top_10[$i]["nb_paires"] ?></td>                                                 
                                    <td class="border"><?= number_format($top_10[$i]["temps"], 3) ?></td>
                                    <td class="border"><?= $top_10[$i]["nb_coups"] ?></td>
                                <?php
                            }                                        
                    ?>
                </tbody>
            </table>    
        </section>         
        <section id="top_paires">
            <section>
                 <form action="fame.php#top_paires" method="POST" id="form_top_paire">
                    <select name="top_paire" id="select_top_paire">
                    <?php
                        for($i=3; $i<=$nb_paire["nb_paire"]; $i++)
                            {
                                ?>                            
                                    <option value="<?= $i ?>"
                                    <?php if(isset($_POST["top_paire"]) && $i == $_POST["top_paire"])
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
                    <input type="submit" name="choix_top" class="btn" value="Choisir">
                </form>     
            </section>
            <section>
                <?php
                 if(isset($_POST["top_paire"], $_POST["choix_top"]) && !empty($top_paire))
                        {
                            ?>
                             <table class="table table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="5">TOP 10 : <?= $top_paire[0]["nb_paires"]?> paires</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="titre_top">
                                        <td>Place</td>
                                        <td>Nom</td>
                                        <td>Score</td>
                                        <td>Temps</td>
                                        <td>Nombre de coups</td>
                                    </tr>   
                                    <?php                
                                        for($i=0; $i<($nb_top_paire); $i++)
                                            {
                                                ?>
                                                <tr>
                                                    <td class="border"># <?= ($i+1)?></td>
                                                    <td class="border"><?=$top_paire[$i]['username']?></td>
                                                    <td class="border"><?=$top_paire[$i]['score']?></td>
                                                    <td class="border"><?= number_format($top_paire[$i]['temps'], 3)?></td>
                                                    <td class="border"><?=$top_paire[$i]['nb_coups']?></td>
                                                </tr>                            
                                                <?php
                                            }
                                    ?>
                                </tbody>
                            </table>   
                            <?php
                        }
                    else if(isset($_POST["top_paire"], $_POST["choix_top"]) && empty($top_paire))
                        {
                            ?>
                                <p class="alert alert-info">Il n'y a pas encore de score disponible</p>
                            <?php
                        }                       
                ?>
            </section>                       
        </section>
    </main>
    <?php include 'inc/footer.php'; ?>
</body>
</html>