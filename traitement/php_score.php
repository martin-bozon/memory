<?php
    //Donnée récupérée au début du jeu
    $nb_paire = 3;
    //Données récupérées à la fin du jeu
    $nb_coups = 6;
    $temps = 6;
    //Initialisations des variables de comparaison   
        //Variable max points 
        $coups_min = $nb_paire*2;
        $temps_min = $coups_min;            
        $max = 500;        
        //Calcul le nombre de points en fonction du temps 
        $seconde_temps = 100/$temps_min;                   
        $score_temps = $max-(($temps-$temps_min)*$seconde_temps);                     
        if($score_temps>0)   
            {                         
                $score_temps = round($score_temps);
            }  
        else   
            $score_temps = 0;    
            
        //Calcul le nombre de points en fonction du nombre de coups
        $seconde_coup = 250/$coups_min;
        $score_coup = $max-(($nb_coups-$coups_min)*$seconde_coup);
        if($score_coup>0)
            {
                $score_coup = round($score_coup);
            }
        else
            $score_coup = 0;
        //Score final
        echo $score = $score_coup+$score_temps;
        //Insertion du score dans la bdd        
?>
