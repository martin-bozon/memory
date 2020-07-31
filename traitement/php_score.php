<?php
    //Donnée récupérée au début du jeu
    $nb_paire = 3;
    //Données récupérées à la fin du jeu
    $nb_coups = 6;
    $temps = 18;
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
                echo $score_temps = round($score_temps);
            }  
        else   
            echo $score_temps = 0;      
                

        //Variables temps qui augmente
            //temps            
            $temps2 = $temps_min + 2;
            $temps3 = $temps2 + 2;
            //coups
            // $coups2 = $coups_min++;
            // $coups3 = $coups2++;


    //Implémente coups
    // for($coups=$coups_min; $coups<=$nb_coups; $coups++)
    //     {            
    //         //Conditions si nb_coups = coups_min
    //          if($nb_coups == $coups && $nb_coups == $coups_min)
    //             {
    //                 //Implémente temps_jeu
    //                 for($temps_jeu=0; $temps_jeu<=$temps; $temps_jeu+2)
    //                     {
    //                         //Conditions en fonction du temps 
    //                         if($temps == $temps_min)
    //                             {
    //                                 echo $score = $max;     
    //                                 break;               
    //                             }
    //                         else if($temps>$temps_min && $temps<=$temps2)
    //                             {
    //                                 echo $score = $max - $décrémentation;  
    //                                 break;                 
    //                             }
    //                         else if($temps>$temps_min && $temps<=$temps3)
    //                             {
    //                                 echo $score = $max - ($décrémentation*2);  
    //                                 break;                 
    //                             }
    //                     }                    
    //             }    
    //         //Conditions si nb_coups 
    //         else if($nb_coups>$coups && $nb_coups<($coups_min+2))
    //             {
    //                 //Conditions en fonction du temps 
    //                 if($temps == $temps_min)
    //                     {
    //                         echo $score = 901;      
    //                         break;             
    //                     }
    //                 else if($temps>$temps_min && $temps<=$temps2)
    //                     {
    //                         echo $score = 800;  
    //                         break;                  
    //                     }
    //             }
    //         else if($nb_coups>$coups && $nb_coups<($coups_min+4))
    //             {
    //                 //Conditions en fonction du temps 
    //                 if($temps == $temps_min)
    //                     {
    //                         echo $score = 801;      
    //                         break;             
    //                     }
    //                 else if($temps>$temps_min && $temps<=$temps2)
    //                     {
    //                         echo $score = 700;  
    //                         break;                  
    //                     }
    //             }
    //     }
   
?>
