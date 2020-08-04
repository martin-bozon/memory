 <?php
require 'traitement/php_score.php';
require_once 'inc/bootstrap.php';
    $bdd = App::getDatabase();    

    //Récupère les infos des 10 premiers scores au général
    // $query_top10 = $bdd->query('SELECT login, score_total FROM `utilisateurs` WHERE score_total IS NOT NULL ORDER BY score_total DESC LIMIT 10');
    // $top_10 = $query_top10->fetchAll(PDO::FETCH_ASSOC);  
    $top_10 = $bdd->query('SELECT username, score_total FROM `utilisateurs` WHERE score_total IS NOT NULL ORDER BY score_total DESC LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
    //Sert pour la génération du tableau
    $nb_score = count($top_10);   
    
    //Récupère le nombre de paires
    // $query_nb_paire = $bdd->query('SELECT COUNT(id) as nb_paire FROM paires');
    // $nb_paire = $query_nb_paire->fetch(PDO::FETCH_ASSOC);
    $nb_paire = $bdd->query('SELECT COUNT(id) as nb_paire FROM card')->fetch(PDO::FETCH_ASSOC);
    //Récpère les infos du TOP 10 en fonction du nombre de paires    
    if(isset($_POST["top_paire"], $_POST["choix_top"]))
        {
            $paire = $_POST["top_paire"];

            // $prepare_top_paire = $bdd->prepare('SELECT utilisateurs.login, score, nb_paires, temps, coups FROM score INNER JOIN utilisateurs ON score.id_user=utilisateurs.id WHERE nb_paires=? ORDER BY score DESC LIMIT 10');
            // $prepare_top_paire->execute([$paire]);
            // $top_paire = $prepare_top_paire->fetchAll(PDO::FETCH_ASSOC);  
            $top_paire = $bdd->query('SELECT utilisateurs.login, score, nb_paires, temps, coups FROM score INNER JOIN utilisateurs ON score.id_user=utilisateurs.id WHERE nb_paires=? ORDER BY score DESC LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);  
            
            $nb_top_paire = count($top_paire);            
        }            
?>