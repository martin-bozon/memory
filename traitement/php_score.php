<?php

function score(
    $p,
    $c,
    $t,
    $si,
    $bdd
)//Prends en paramètre, le nombre de paire, le  nombre de coups, le temps, l'id du joueur et la bdd
{
    //Initialisations des variables de comparaison
    //Variable max points
    $coups_min = $p * 2;
    $temps_min = $coups_min;
    $max = 500;
    //Calcul le nombre de points en fonction du temps
    $seconde_temps = 100 / $temps_min;
    $score_temps = $max - (($t - $temps_min) * $seconde_temps);
    if ($score_temps > 0) {
        $score_temps = round($score_temps);
    } else {
        $score_temps = 0;
    }

    //Calcul le nombre de points en fonction du nombre de coups
    $seconde_coup = 250 / $coups_min;
    $score_coup = $max - (($c - $coups_min) * $seconde_coup);
    if ($score_coup > 0) {
        $score_coup = round($score_coup);
    } else {
        $score_coup = 0;
    }
    //Score final
    $score = $score_coup + $score_temps;
    //Insertion du score dans la bdd
    if (isset($score, $si) && $score >= 0) {
        //Insère le score de la partie
        $bdd->query(
            'INSERT INTO score (id_user, score, nb_paires, temps, coups) VALUES (?,?,?, ?,?)',
            [$si, $score, $p, $t, $c]
        );
        //Calcul le score total du joueur
        $add_score = $bdd->query('SELECT SUM(score) as total_score FROM score WHERE id_user=?', [$si])->fetch();
        //Mets à jour le score total du joueur
        $bdd->query('UPDATE utilisateurs SET score_total=? WHERE id=?', [$add_score->total_score, $si]);
    }
    return $score;
}
