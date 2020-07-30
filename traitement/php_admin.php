<?php
    require 'fonctions/fonction_admin.php';
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
    //Récupère les users avec une pagination
    // $par_page = 10;
    // $query_recup_users = $bdd->query('SELECT * FROM utilisateurs');
    // $recup_users = $query_recup_users->fetchAll(PDO::FETCH_ASSOC);
    // $nb_users = count($recup_users);    
    
    $info_users = paginationDix(10, 'utilisateurs', '');   

    //Récupère les scores
    $query_recup_score = $bdd->query('SELECT score.id, score, login, score.nb_paires FROM utilisateurs INNER JOIN score');
    $recup_score = $query_recup_score->fetchAll(PDO::FETCH_ASSOC);
    $nb_score = count($recup_score);   
    //Upload d'images pour les paires
    try
        {
            uploadImage($bdd);
        }
    catch(Exception $e)
        {
            $e->getMessage();
        }

    //Récupère les paires
    $query_recup_paires = $bdd->query('SELECT * FROM paires');
    $recup_paires = $query_recup_paires->fetchAll(PDO::FETCH_ASSOC);
    $nb_paires_total = count($recup_paires);
?> 