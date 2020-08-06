<?php

$page_selected = 'memory';
ob_start();
require_once 'inc/bootstrap.php';

$auth = App::getAuth();
$db = App::getDatabase();
$session = Session::getInstance();
$board = new Board;
$score = new Score();
$maxPairs = $board->maxPairs($db);


//Créer le board en fonction du nombre de pairs

if (isset($_POST['pairs_in_game'])) {
    $session->write('pairs_in_game', $_POST['pairs_in_game']);
    $test = true;
    $cardsOnBoard = $board->downloadCards($db, $_POST['pairs_in_game']);
    $counter_card = 1;

    foreach ($cardsOnBoard as $card) {
        $cards[] = new card($counter_card, $card->id, $card->image_path);
        $counter_card++;
        $cards[] = new card($counter_card, $card->id, $card->image_path);
        $counter_card++;
    }
    if (isset($cards)) {
        $session->write('cards', $cards);
        shuffle($_SESSION['cards']);
        $session->write('temps_debut', new DateTime);
    }
}

//Gestion du jeu

//counter nombre de coups

if (isset($_POST['id_card_selected'])) {
    if ( !isset($_SESSION['lastCard']) OR $_POST['id_card_selected'] != $_SESSION['lastCard']) {
        if (!isset($_SESSION['number_coups'])) {
            $session->write('number_coups', 1);
        } else {
            $_SESSION['number_coups']++;
        }
    } else {
        foreach ($_SESSION['cards'] as $card) {
            if ($_SESSION['lastCard'] == $card->getId() and $card->getVisibility() == 'hidden') {
                if (!isset($_SESSION['number_coups'])) {
                    $session->write('number_coups', 1);
                } else {
                    $_SESSION['number_coups']++;
                }
            }
        }
    }
}


if (isset($_POST['pairsChoiceMenu']) or isset($_POST['play_again'])) {
    $session->delete('cards');
    $session->delete('number_coups');
    $session->delete('temps_debut');
    $session->delete('temps_fin');
    $session->delete('lastCard');
    header('location:memory.php');
}

if (isset($_SESSION['cards'])) {
    //Si c'est win
    if ($board->isWin($_SESSION['cards'])) {
        $session->write('temps_fin', new DateTime);
        $chrono = $score->timescore($_SESSION['temps_debut'], $_SESSION['temps_fin'], $session); //time
        $number_coups = $_SESSION['number_coups']; //nombre de coups
        //points
        include 'traitement/php_score.php';
        $points = score($_SESSION['pairs_in_game'], $number_coups, $chrono, $auth->user()->id, $db);
        //clear sessions
        $session->delete('cards');
        $session->delete('number_coups');
        $session->delete('pairs_in_game');
        $session->delete('lastCard');
        $endofgame = true;
    } //Si il y a 2 cartes visibles
    else {
        if ($board->visibleCards($_SESSION['cards']) >= 2) {
            //Si c'est une paire
            if ($board->pairsCheck($_SESSION['cards'])) {
                $twin_cards = $board->pairsCheck($_SESSION['cards']);
                foreach ($twin_cards as $twin_card) {
                    $twin_card->setVisibility('hidden');
                    $twin_card->setState('found');
                }
            } else {
                foreach ($_SESSION['cards'] as $card) {
                    $card->setVisibility('hidden');
                }
            }
            header('location:memory.php');
        } //Si une carte est sélectionnée
        else {
            if (isset($_POST['id_card_selected'])) {
                foreach ($_SESSION['cards'] as $card) {
                    if ($card->getId() == $_POST['id_card_selected']) {
                        $card->setVisibility($card->switchVisibility($session, $card->getId()));
                    }
                }
                header('Refresh: 0.05; memory.php');
            }
        }
    }
}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memory THE GAME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <?php
    isset($_SESSION['cards']) ?: include 'inc/header.php';
    ?>
</header>

<main id="main_memory" class="d-flex flex-column justify-content-center align-items-center h-100">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog position-relative">
            <video height="343" autoplay loop poster="/src/images/animated-season-2014-finals.webm" id="bgvid">
                <source src="src/images/animated-season-2014-finals.webm" type="video/webm">
            </video>
            <div id="victory" class="modal-content position-absolute">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">VICTOIRE</h5>
                </div>
                <div class="modal-body">
                    <h3>Voici votre score :</h3>
                    <p class="">Nombre de coups : <?= $number_coups ?></p>
                    <p class="">Temps : <?= number_format($chrono, 3) ?></p>
                    <p class="font-weight-bold">Points : <span class="score"><?= $points ?></span></p>
                </div>
                <div class="modal-footer d-flex flex-row justify-content-around align-items-center">
                    <button type="submit" class="button" data-dismiss="modal" name="play_again">Rejouer
                        <button type="submit" class="button"><a href="historique.php">Voir mes scores</a>
                        </button>
                </div>
            </div>
        </div>
    </div>
    <?php
    //formulaire de sélection des paires
    if (!isset($_SESSION['cards'])): ?>
        <form class="" method="post" action="">
            <h3 class="choose_difficulty text-center">Choisissez la difficulté (nombre de paires) :</h3>
            <?php
            for ($i = 3; $i <= $maxPairs and $i <= 15; $i++) : ?>
                <input class="button" type="submit" name="pairs_in_game" value="<?= $i ?>">
            <?php
            endfor; ?>
        </form>
    <?php
//Board
    else: ?>
        <form method="post" class="px-4 d-flex flex-column justify-content-between align-items-center w-100 h-100">
            <div id="board" class="row">
                <?php
                foreach ($_SESSION['cards'] as $card): ?>
                    <label class=""><img
                                src="<?= $card->getVisibility() == 'visible' ? $card->getImagePath() : 'src/images/BackCard.jpg'; ?>"
                                alt=""
                                role="button"
                                class="cards <?= $card->getState() == 'inGame' ? '' : 'hidden'; ?>">
                        <input class="sr-only" type="submit" value="<?= $card->getId(); ?>" name="id_card_selected" <?= $card->getState() == 'inGame' ? '' : 'disabled'; ?>>
                    </label>
                <?php
                endforeach; ?>
            </div>
            <div class="">
                <?php
                if (isset($_SESSION['number_coups'])) {
                    echo "<p class='text-white m-0'>Nombre de coups :";
                    echo $_SESSION['number_coups'];
                    echo "</p>";
                }
                ?>
            </div>
            <div>
                <label class=""><p class="button" role="button">Retourner au choix du nombre de paires</p>
                    <input class="sr-only" type="submit" name="pairsChoiceMenu">
                </label>
            </div>
        </form>
    <?php
    endif; ?>
    <?php
    ob_end_flush();
    ?>
</main>
<footer>
    <?php
    isset($_SESSION['cards']) ?: include 'inc/footer.php'
    ?>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<?php
if (isset($endofgame)) : ?>
    <script>
        jQuery.noConflict();
        jQuery('#staticBackdrop').modal('show');
    </script>
<?php
endif; ?>
</body>
</html>







