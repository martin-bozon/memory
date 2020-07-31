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

        //Variables points dégréssif
            //temps            
            $temps2 = $temps + 2;
            $temps3 = $temps2 + 2;
            //coups
            $coups2 = $coups_min++;
            $coups3 = $coups2++;


    //Implémente coups
    // for($coups=0; $coups<=$nb_coups; $coups++)
    //     {
            //Conditions si nb_coups = coups_min
             if($nb_coups == $coups_min)
                {
                    //Implémente temps_jeu
                    // for($temps_jeu=0; $temps_jeu<=$temps; $temps_jeu+2)
                    //     {
                            //Conditions en fonction du temps 
                            if($temps == $temps_min)
                                {
                                    echo 1000;     
                                    break;               
                                }
                            else if($temps>$temps_min && $temps<=$temps_jeu)
                                {
                                    echo 900;  
                                    break;                 
                                }
                        // }
                    
                }    
            //Conditions si nb_coups > coups_min
            else if($nb_coups == $coups2)
                {
                    //Conditions en fonction du temps 
                    if($temps == $temps_min)
                        {
                            echo 900;                   
                        }
                    else if($temps>$temps_min && $temps<=$temps2)
                        {
                            echo 800;                    
                        }
                }
        // }
   
?>
