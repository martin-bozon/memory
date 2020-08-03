<?php


class Board
{
    public function downloadCards($db, $nb_pairs)
    {
        return $db->query("SELECT * FROM card ORDER BY RAND() LIMIT $nb_pairs")->fetchAll();
    }

    public function maxPairs($db)
    {
        $pairs = $db->query("SELECT COUNT(*) AS numberOfPairs FROM card")->fetch();
        return (int)$pairs->numberOfPairs;
    }

    public function visibleCards($cards)
    {
        $count = 0;
        foreach ($cards as $card) {
            if ($card->getVisibility() == 'visible') {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @param $cards
     * @return bool |array
     */
    public function pairsCheck($cards)
    {
        foreach ($cards as $card) {
            if ($card->getVisibility() == 'visible') {
                $twin_card[] = $card;
            }
        }
        var_dump($_SESSION['cards']);
        var_dump($twin_card);
        if ($twin_card[0]->getIdPair() == $twin_card[1]->getIdPair()) {
            return $twin_card;
        }
        return false;
    }

    public function isWin($cards){
        foreach ($cards as $card){
            if ($card->getState() == 'inGame'){
                return false;
            }
        }
        return true;
    }
}