<?php
    require 'fonctions/fonction_admin.php';
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
    //Récupère les users et prepare la pagination
    $info_users = prepaPagination(10, 'utilisateurs', '', 'login');   
    //Pagination user

    //Récupère les scores et prepare la pagination
    $info_scores = prepaPagination(10, 'score', '', 'score');
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
    $query_recup_paires = $bdd->query('SELECT * FROM paires');
    $recup_paires = $query_recup_paires->fetchAll(PDO::FETCH_ASSOC);
    $nb_paires_total = count($recup_paires);
?> 