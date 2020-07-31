<?php

require 'inc/bootstrap.php';
$auth = App::getAuth();
$auth->restrict();
$db = App::getDatabase();

if (isset($_POST['submitPseudo'])) {
    $validator = new Validator($_POST);
    $validator->isPseudo(
        'username',
        "Votre pseudo n'est pas valide, celui-ci doit:<br> contenir entre 3 et 20 caractères."
    );
    if ($validator->isValid()) {
        $validator->isUniq('username', $db, 'utilisateurs', 'Ce pseudo est déjà pris.');
    }
    if ($validator->isValid()) {
        $auth->updateProfil($db, 'username', $_POST['username'], $auth->user()->id);
        Session::getInstance()->setFlash('success', 'Votre pseudo a bien été modifié.');
    } else {
        $errors = $validator->getErrors();
    }
}

if (isset($_POST['submitPassword'])) {
    if (password_verify($_POST['password'], $auth->user()->password)) {
        if ($_POST['password'] == $_POST['new_password']) {
            session::getInstance()->setFlash(
                'danger',
                "Votre nouveau mot de passe ne peux pas être identique à l'ancien."
            );
        } else {
            $validator = new Validator($_POST);
            $validator->isConfirmed('new_password', 'Les mots de passe ne sont pas identique.');
            if ($validator->isValid()) {
                $validator->isPassword(
                    'new_password',
                    "Votre mot de passe n'est pas valide, celui-ci doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre."
                );
            }
            if ($validator->isValid()) {
                $password = $auth->hashPassword($_POST['new_password']);
                $auth->updateProfil($db, 'password', $password, $auth->user()->id);
                Session::getInstance()->setFlash('success', 'Votre mot de passe a bien été modifié.');
            } else {
                $errors = $validator->getErrors();
            }
        }
    } else {
        session::getInstance()->setFlash('danger', "L'ancien mot de passe est incorrect.");
    }
}
$auth = App::getAuth();

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
<body>
<header>
    <?php
    require 'inc/header.php'; ?>
</header>
<main id="main_profil" class="d-flex flex-column">
    <?php
    if (!empty($errors)): ?>
        <div class="alert alert-danger mx-auto">
            <p>Modification impossible : </p>
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
    <div class="container d-flex flex-row">
        <form action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Modifier pseudo</h1>

            <div class="form-group">
                <label class="sr-only" for="username">Pseudo</label>
                <input type="text" name="username" class="form-control" placeholder="<?= $auth->user()->username ?>">
            </div>

            <button type="submit" name="submitPseudo" class="btn btn-lg btn-primary btn-block">Modifier</button>

        </form>

        <form action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Modifier mot de passe</h1>

            <div class="form-group">
                <label class="sr-only" for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Ancien mot de passe">
            </div>

            <div class="form-group">
                <label class="sr-only" for="new_password">Nouveau mot de passe</label>
                <input type="password" name="new_password" class="form-control" placeholder="Nouveau mot de passe">
            </div>

            <div class="form-group">
                <label class="sr-only" for="new_password_confirm">Nouveau mot de passe</label>
                <input type="password" name="new_password_confirm" class="form-control"
                       placeholder="Confirmer mot de passe">
            </div>

            <button type="submit" name="submitPassword" class="btn btn-lg btn-primary btn-block">Modifier</button>

        </form action="" method="post">
    </div>
</main>
<footer>
    <?php
    require 'inc/footer.php'; ?>
</footer>
</body>
</html>
