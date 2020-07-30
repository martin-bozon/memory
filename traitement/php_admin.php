<?php
    require 'fonctions/fonction_admin.php';
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
    //Récupère les users et prepare la pagination
    $info_users = prepaPagination(10, 'utilisateurs', '', 'login');
    $pp_user = $info_users['par_page'];
    $nb_user = $info_users['nb'];
    $p_user = $info_users['page'];    
    //Pagination user

    //Récupère les scores et prepare la pagination
    $info_scores = prepaPagination(10, 'score', '', 'score');
    $pp_score = $info_scores['par_page'];
    $nb_score = $info_scores['nb'];
    $p_score = $info_scores['page'];    
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
    $info_paires = prepaPagination(5, 'paires', '', 'id');    
    $pp_paire = $info_paires['par_page'];
    $nb_paire = $info_paires['nb'];
    $p_paire = $info_paires['page'];    
?> 