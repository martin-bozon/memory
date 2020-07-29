<?php
$bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
//Suppression images paires
if(isset($_GET["id_paires"]))
    {
        $id_paires = $_GET["id_paires"];
        $suppression_paire = $bdd->prepare('DELETE FROM paires WHERE id=?');
        $suppression_paire->execute([$id_paires]);
        header('Location:../admin.php');
    }
?>
