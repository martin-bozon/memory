<?php

require_once 'inc/bootstrap.php';

$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if ($auth->user()){
    App::redirect('account.php');
}

if (!empty($_POST)) {
    $validator = new Validator($_POST);
    $validator->isPseudo('username', "Votre pseudo n'est pas valide.");
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

        App::getAuth()->register($db, $_POST['username'],$_POST['password']);
        Session::getInstance()->setFlash('success','Vous avez bien été enregistré, veuillez vous connecter.');
        App::redirect('connexion.php');
    }else{
        $errors = $validator->getErrors();
    }
}

?>
<h1>S'incrire</h1>

<?php
if (!empty($errors)): ?>
    <div class="alert-box">
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

<form action="" method="post">

    <div class="form-group">
        <label for="username">Pseudo</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirm">Confirmation mot de passe</label>
        <input type="password" name="password_confirm" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>

