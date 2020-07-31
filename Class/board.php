<?php


class board
{
    public function downloadCards($db, $nb_pairs){
        return $db->query("SELECT * FROM card ORDER BY RAND() LIMIT $nb_pairs")->fetchAll();
    }
    public function maxPairs($db){
        $pairs = $db->query("SELECT COUNT(*) AS numberOfPairs FROM card")->fetch();
        return (int)$pairs->numberOfPairs;
    }
}