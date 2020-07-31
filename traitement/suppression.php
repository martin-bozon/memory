<?php
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
    //Suppression images paires
    if(isset($_GET["id_paires"]))
        {
            $id_paires = $_GET["id_paires"];
            $page = $_GET["page"];
            $suppression_paire = $bdd->prepare('DELETE FROM paires WHERE id=?');
            $suppression_paire->execute([$id_paires]);            
            header('Location:../admin.php?paire=' . $page . '#ad_paires');
        }
    //Suppression utilisateur
    if(isset($_GET["id_user"]))
        {
            $id_user = $_GET["id_user"];
            $suppression_user = $bdd->prepare('DELETE FROM utilisateurs WHERE id=?');
            $suppression_user->execute([$id_user]);            
            header('Location:../admin.php');
        }
    //Suppression score
    if(isset($_GET["id_score"]))
        {
            $id_score = $_GET["id_score"];
            $suppression_score = $bdd->prepare('DELETE FROM score WHERE id=?');
            $suppression_score->execute([$id_score]);            
            header('Location:../admin.php');
        }
?>
