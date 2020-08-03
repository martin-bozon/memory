<?php
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');

    //Récupère le score total du joueur
    $prepare_score_j = $bdd->prepare('SELECT score_total FROM utilisateurs WHERE id=?');
    $prepare_score_j->execute([3]);
    $score_j = $prepare_score_j->fetch(PDO::FETCH_ASSOC);      

    //Permet de générer sa place 
    $prepare_general = $bdd->prepare('SELECT COUNT(score_total) as sup FROM utilisateurs WHERE score_total>?');
    $prepare_general->execute([$score_j["score_total"]]);
    $general = $prepare_general->fetch(PDO::FETCH_ASSOC);   
?>