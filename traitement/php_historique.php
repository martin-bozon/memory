<?php
require_once 'fonctions/fonction_admin.php';
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');

    //Récupère le score total du joueur
    $prepare_score_j = $bdd->prepare('SELECT score_total FROM utilisateurs WHERE id=?');
    $prepare_score_j->execute([1]);//Id du joueur connecté
    $score_j = $prepare_score_j->fetch(PDO::FETCH_ASSOC);      

    //Permet de générer sa place 
    $prepare_general = $bdd->prepare('SELECT COUNT(score_total) as sup FROM utilisateurs WHERE score_total>?');
    $prepare_general->execute([$score_j["score_total"]]);
    $general = $prepare_general->fetch(PDO::FETCH_ASSOC);   

    //Compte le nombre de paire
    $query_nb_paire = $bdd->query('SELECT COUNT(id) as nb_paire FROM paires');
    $nb_paire = $query_nb_paire->fetch(PDO::FETCH_ASSOC);

    //Récupère le top 10 du joueur en fonction du nb paires
    if(isset($_POST["valid_top_paire"], $_POST["paire_joueur"]))
        {
            $select_paire = $_POST["paire_joueur"];
            $prepare_top_paire_j = $bdd->prepare('SELECT * FROM score WHERE id_user=? AND nb_paires=? ORDER BY score DESC LIMIT 10');
            $prepare_top_paire_j->execute([1, $select_paire]);//Id du joueur connecté & nombre de paire
            $top_paire_j = $prepare_top_paire_j->fetchAll(PDO::FETCH_ASSOC);
            
            $nb_score = count($top_paire_j);           
        }
    
?>