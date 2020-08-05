<?php
    require_once 'fonctions/fonction_admin.php';
    require_once 'inc/bootstrap.php';
    $bdd = App::getDatabase();
    $auth = App::getAuth();

    //Récupère le score total du joueur
    $score_j = $bdd->query('SELECT username, score_total FROM utilisateurs WHERE id=?', [$auth->user()->id])->fetch(PDO::FETCH_ASSOC);    
    //Permet de générer sa place        
    $general = $bdd->query('SELECT COUNT(score_total) as sup FROM utilisateurs WHERE score_total>?', [$score_j["score_total"]])->fetch(PDO::FETCH_ASSOC);
    //Compte le nombre de paire   
    $nb_paire = $bdd->query('SELECT COUNT(id) as nb_paire FROM card')->fetch(PDO::FETCH_ASSOC);

    //Récupère les 3 dernieres parties
    $last_partie = $bdd->query('SELECT * FROM score WHERE id_user=? ORDER BY id DESC LIMIT 3', [$auth->user()->id])->fetchAll(PDO::FETCH_ASSOC);   
    $nb_last_partie = count($last_partie);

    //Récupère le top 10 du joueur en fonction du nb paires
    if(isset($_POST["valid_top_paire"], $_POST["paire_joueur"]))
        {
            $select_paire = $_POST["paire_joueur"];
           
            $top_paire_j = $bdd->query('SELECT * FROM score WHERE id_user=? AND nb_paires=? ORDER BY score DESC LIMIT 10', [$auth->user()->id, $select_paire])->fetchAll(PDO::FETCH_ASSOC);
            
            $nb_score = count($top_paire_j);           
        }
    
?>