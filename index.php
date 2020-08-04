<?php

require_once 'inc/bootstrap.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>
<body>
<header>
    <?php
    include 'inc/header.php'; ?>
</header>
<main id="main_index">
    <section id="info_main">
        <h1 class="text-white">Bienvenue sur Memory</h1>
        <?php
        include 'traitement/php_index.php'; ?>
    </section>
    <section id="reglement">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            Règlement
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
             role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Règlement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Règles du jeu</h3>
                        <ol>
                            <li>Pour jouer vous devez avoir créer un compte</li>
                            <li>Commencer par cliquer sur "Nouvelle partie"</li>
                            <li>Choisisez le nombre de paires</li>
                            <li>Le but du jeu va être de rassembler toutes les paires</li>
                            <li>Cliquer sur une carte face cachée pour la retourner</li>
                            <li>Cliquer sur une deuxième carte pour la retourner</li>
                            <li>Si se sont les mêmes cartes, bravo vous avez trouvé une paire</li>
                            <li>Si elles sont différentes, j'espère que vous avez mémorisé leur place et l'image, car
                                elles vont se retourner
                            </li>
                            <li>Retour à l'étape 5 jusqu'à ce que vous ayez rassemblé toutes les paires</li>
                            <li>Vous avez rassemblé toutes les paires, BRAVO. Vous pouvez rejouer ou consolter le Wall
                                of Fame
                            </li>
                        </ol>
                        <h3>Gestion score</h3>
                        <ul>
                            <li>Le score est générer en fonction du temps et du nombre de coups</li>
                            <li>500 points sont accordés si le nombre de coups pour gagner est égal au nombre de cartes
                                présentes sur la plateau au début du jeu
                            </li>
                            <li>500 autres points sont accordés si le temps pour gagner et lui aussi égal au nombre de
                                cartes présentes sur la plateau au début du jeu
                            </li>
                            <li>Le score maximum est donc de 1000 points</li>
                            <li>Il est possible d'obtenir un score supérieur à 1000, si votre temps est inférieur au
                                nombre de cartes présentes sur la plateau au début du jeu et bien sur, que le nombre de
                                coups soit égal au nombre de cartes présentes sur la plateau au début du jeu
                            </li>
                            <li>Plus vous cliquez et/ou prennez de temps pour jouer, plus le score va se rapprocher de
                                0
                            </li>
                            <li>On ne peut pas avoir moins de 0 points</li>
                            <li>Retrouvez votre classement en fonction du nombre de paires, sur votre profil</li>
                            <li>Le classement général est calculé en fonction du cumul de tous vos scores et comparé
                                avec le cumul des scores des autres joueurs
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Compris</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <?php
    include 'inc/footer.php'; ?>
</footer>
</body>
</html>