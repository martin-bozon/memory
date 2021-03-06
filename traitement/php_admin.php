<?php
    require 'fonctions/fonction_admin.php';
    require_once 'inc/bootstrap.php';
    $bdd = App::getDatabase();
    
    //Récupère les users et prepare la pagination   
    $get_user = (isset($_GET["user"])? $_GET["user"] : 1);
    $info_users = prepaPagination(10, 'utilisateurs', $get_user, 'username', $bdd);
    $pp_user = $info_users['par_page'];
    $nb_total_user = $info_users['nb_total'];
    $nb_user = $info_users['nb_page'];
    $p_user = $info_users['page'];    
   
    //Récupère les scores et prepare la pagination
    $get_score = (isset($_GET["score"])? $_GET["score"] : 1);
    $info_scores = prepaPagination(10, 'score', $get_score, 'score', $bdd);
    $pp_score = $info_scores['par_page'];
    $nb_total_score = $info_scores['nb_total'];
    $nb_score = $info_scores['nb_page'];
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
    $get_paire = (isset($_GET["paire"])? $_GET["paire"] : 1);
    $info_paires = prepaPagination(5, 'card', $get_paire, 'id', $bdd);    
    $pp_paire = $info_paires['par_page'];
    $nb_total_paire = $info_paires['nb_total'];
    $nb_paire_page = $info_paires['nb_page'];
    $p_paire = $info_paires['page'];        

    //Traite le retour sur la bonne page 
    $retour_page = (isset($_GET["page"])?$_GET["page"] : 1);
?> 