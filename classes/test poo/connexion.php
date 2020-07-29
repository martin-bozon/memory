<?php

require 'inc/bootstrap.php';
$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if ($auth->user()){
    App::redirect('account.php');
}
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if ($user){
        $session->setFlashes('succes',"Vous êtes maintenant connecté.");
        App::redirect('account.php');
    }else{
        $session->setFlash('danger', "Identifiant ou mot de passe incorrect.");
    }
}
?>
<?php require 'inc/header.php'; ?>
<form action="" method="post">

    <div class="form-group">
        <label for="username">Pseudo</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div>
        <label for="remember">
        <input type="checkbox" name="remember" value="1">Se souvenir de moi
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>

</form>
