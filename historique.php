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
    <main>
        <section>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Votre score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Place</td>
                    <td>Score</td>
                </tr>
                <tr>
                    <td><?= ($general["sup"] + 1) ?></td>
                    <td><?=$score_j["score_total"]?></td>
                </tr>
            </tbody>
            </table>
        </section>
        <section>
            <section>
                <!-- select nb paire -->
            </section>
            <section>
                <!-- table score perso par paire -->
            </section>
        </section>
    </main>

    <?php include 'inc/footer.php';?>
</body>
</html>