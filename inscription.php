<?php

require_once 'inc/bootstrap.php';

$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if ($auth->user()) {
    App::redirect('profil.php');
}

if (!empty($_POST)) {
    $validator = new Validator($_POST);
    $validator->isPseudo('username', "Votre pseudo n'est pas valide, celui-ci doit:<br> contenir entre 3 et 20 caractères.");
    if ($validator->isValid()) {
        $validator->isUniq('username', $db, 'utilisateurs', 'Ce pseudo est déjà pris.');
    }
    $validator->isConfirmed('password', 'Les mots de passe ne sont pas identique.');
    if ($validator->isValid()) {
        $validator->isPassword(
            'password',
            "Votre mot de passe n'est pas valide, celui-ci doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre."
        );
    }
    /*var_dump($validator);
    var_dump($validator->isValid());*/

    if ($validator->isValid()) {
        App::getAuth()->register($db, $_POST['username'], $_POST['password']);
        Session::getInstance()->setFlash('success', 'Vous avez bien été enregistré, veuillez vous connecter.');
        App::redirect('connexion.php');
    } else {
        $errors = $validator->getErrors();
    }
}
?>

<!doctype html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion - Memory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
</head>
<body class="h-100">
<header>
    <?php
    require 'inc/header.php'; ?>
</header>
<main id="main_inscription" class="d-flex flex-column">
    <?php
    if (!empty($errors)): ?>
        <div class="alert alert-danger m-auto">
            <p>Inscription impossible : </p>
            <ul>
                <?php
                foreach ($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php
                endforeach; ?>
            </ul>
        </div>
    <?php
    endif; ?>
    <div class="container">
        <?php
        if (Session::getInstance()->hasFlashes()): ?>
            <?php
            foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php
            endforeach; ?>
        <?php
        endif; ?>
    </div>
    <div class="form_auth text-center">
        <h1 class="h3 mb-3 font-weight-normal">S'incrire</h1>
        <form action="" method="post">

            <div class="form-group">
                <label class="sr-only" for="username">Pseudo</label>
                <input type="text" name="username" class="form-control" placeholder="Pseudo">
            </div>

            <div class="form-group">
                <label class="sr-only" for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>

            <div class="form-group">
                <label class="sr-only" for="password_confirm">Confirmation mot de passe</label>
                <input type="password" name="password_confirm" class="form-control"
                       placeholder="Confirmation mot de passe">
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block">M'inscrire</button>

        </form>
        <p>Vous avez déjà un compte ? <a href="connexion.php">Connexion</a></p>
    </div>
</main>
<footer>
    <?php
    require 'inc/footer.php'; ?>
</footer>
</body>
</html>