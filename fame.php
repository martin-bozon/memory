<?php
    // session_start();
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
        <?php //include 'inc/header.php'; ?>
    </header>    
    <main id="main_fame">        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th colspan="2">TOP 10 C'est super</th>                
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nom</td>
                    <td>Score</td>
                </tr>   
                <?php                
                    for($i=0; $i<$nb_score; $i++)
                        {
                            ?>
                            <tr>
                                <td><?=$top_10[$i]['login']?></td>
                                <td><?=$top_10[$i]['score_total']?></td>
                            </tr>                            
                            <?php
                        }
                ?>
            </tbody>
        </table>    
        <section>
            <form action="" method="POST">
                <select name="top_paire" id="">
                <?php
                    for($i=3; $i<=$nb_paire["nb_paire"]; $i++)
                        {
                            ?>                            
                            <option value="<?= $i ?>"><?= $i ?> paires</option>                              
                            <?php
                        }
                ?>
                </select>
                <input type="submit" name="choix_top" class="btn btn-primary" value="Choisir">
            </form>
            <table>
            <table class="table">
            <thead class="thead-light">
                <tr>
                    <th colspan="2">TOP 10 : X paires</th>                
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nom</td>
                    <td>Score</td>
                </tr>   
                <?php                
                    for($i=0; $i<$nb_score; $i++)
                        {
                            ?>
                            <tr>
                                <td><?=$top_10[$i]['login']?></td>
                                <td><?=$top_10[$i]['score_total']?></td>
                            </tr>                            
                            <?php
                        }
                ?>
            </tbody>
        </table>    
            </table>
        </section>
    </main>
    <?php include 'inc/footer.php'; ?>
</body>
</html>