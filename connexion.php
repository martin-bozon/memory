<?php

require 'inc/bootstrap.php';
$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if ($auth->user()) {
    App::redirect('profil.php');
}
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if ($user) {
        $session->setFlash('succes', "Vous êtes maintenant connecté.");
        App::redirect('profil.php');
    } else {
        $session->setFlash('danger', "Identifiant ou mot de passe incorrect.");
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
    <link rel="stylesheet" href="css/style.css">
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
</head>
<body class="h-100">
<header>
    <?php
    require 'inc/header.php'; ?>
</header>
<main id="main_connexion" class="d-flex flex-column">
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
        <form action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>

            <div class="form-group">
                <label class="sr-only" for="username">Pseudo</label>
                <input type="text" name="username" class="form-control" placeholder="Pseudo">
            </div>

            <div class="form-group">
                <label class="sr-only" for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>

            <div>
                <label for="remember" class="">
                    <input type="checkbox" name="remember" value="1" class="checkbox mb-3"> Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block">Se connecter</button>

        </form>
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscription</a></p>
    </div>
</main>
    <?php
    require 'inc/footer.php'; ?>
</body>
</html>