<?php
//A SUPPRIMER
$bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
//***** */

    function score($p, $c, $t, $si, $bdd)//Prends en paramètre, le nombre de paire, le  nombre de coups, le temps, l'id du joueur et la bdd
        {
            //Donnée récupérée au début du jeu
            // $p = 3;
            //Données récupérées à la fin du jeu
            // $c = 7;
            // $t = 8;
            //Initialisations des variables de comparaison   
                //Variable max points 
                $coups_min = $p*2;
                $temps_min = $coups_min;            
                $max = 500;        
                //Calcul le nombre de points en fonction du temps 
                $seconde_temps = 100/$temps_min;                   
                $score_temps = $max-(($t-$temps_min)*$seconde_temps);                     
                if($score_temps>0)   
                    {                         
                        $score_temps = round($score_temps);
                    }  
                else   
                    $score_temps = 0;    
                    
                //Calcul le nombre de points en fonction du nombre de coups
                $seconde_coup = 250/$coups_min;
                $score_coup = $max-(($c-$coups_min)*$seconde_coup);
                if($score_coup>0)
                    {
                        $score_coup = round($score_coup);
                    }
                else
                    $score_coup = 0;
                //Score final
                $score = $score_coup+$score_temps;                
                //Insertion du score dans la bdd
                if(isset($score, $si) && $score>=0)
                    {                     
                        //Insère le score de la partie                          
                        $insert_score = $bdd->prepare('INSERT INTO score (id_user, score, nb_paires, temps, coups) VALUES (?,?,?, ?,?)');
                        $insert_score->execute([$si, $score, $p, $t, $c]);                        
                        //Calcul le score total du joueur
                        $prepare_add_score = $bdd->prepare('SELECT SUM(score) as total_score FROM score WHERE id_user=?');
                        $prepare_add_score->execute([$si]);
                        $add_score = $prepare_add_score->fetch(PDO::FETCH_ASSOC);                        
                        //Mets à jour le score total du joueur
                        $update_score = $bdd->prepare('UPDATE utilisateurs SET score_total=? WHERE id=?');
                        $update_score->execute([$add_score['total_score'], $si]);
                    }     
            return $score;                          
        }    
?>