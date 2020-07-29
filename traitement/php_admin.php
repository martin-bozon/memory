<?php
    require 'fonctions/fonction_admin.php';
    $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
    //Upload d'images pour les paires
    try
        {
            uploadImage($bdd);
        }
    catch(Exception $e)
        {
            $e->getMessage();
        }

    //Affichage des paires
    $query_recup_paires = $bdd->query('SELECT * FROM paires');
    $recup_paires = $query_recup_paires->fetchAll(PDO::FETCH_ASSOC);
    $nb_paires_total = count($recup_paires);
?> 