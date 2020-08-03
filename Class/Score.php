<?php


class Score
{
    public function timescore($temps_debut, $temps_fin, $session){
        $timer = $temps_debut->diff($temps_fin);
        if ($timer->i > 0){
            $minutes = $timer->i * 60;
        }
        else{
            $minutes = 0;
        }
        $session->delete('temps_debut');
        $session->delete('temps_fin');
        return $timer->s + $timer->f + $minutes;
    }
}