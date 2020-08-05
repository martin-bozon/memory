 <?php
require 'traitement/php_score.php';
require_once 'inc/bootstrap.php';
    $bdd = App::getDatabase();    

    //Récupère les infos des 10 premiers scores au général    
    $top_gen = $bdd->query('SELECT username, score_total FROM `utilisateurs` WHERE score_total IS NOT NULL ORDER BY score_total DESC LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
    //Sert pour la génération du tableau
    $nb_score = count($top_gen);   

    //Récupère le top 10 des scores toutes paires confondues
    $top_10 = $bdd->query('SELECT utilisateurs.username, temps, nb_coups, nb_paires, score, id_user FROM score INNER JOIN utilisateurs ON utilisateurs.id=score.id_user ORDER BY score DESC LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
    $nb_top_10 = count($top_10);
    //Récupère le nombre de paires   
    $nb_paire = $bdd->query('SELECT COUNT(id) as nb_paire FROM card')->fetch(PDO::FETCH_ASSOC);
    //Récpère les infos du TOP 10 en fonction du nombre de paires    
    if(isset($_POST["top_paire"], $_POST["choix_top"]))
        {
            $paire = $_POST["top_paire"];

            $top_paire = $bdd->query('SELECT utilisateurs.username, score, nb_paires, temps, nb_coups FROM score INNER JOIN utilisateurs ON score.id_user=utilisateurs.id WHERE nb_paires=? ORDER BY score DESC LIMIT 10',[$paire])->fetchAll(PDO::FETCH_ASSOC);  
            
            $nb_top_paire = count($top_paire);            
        }            
?>