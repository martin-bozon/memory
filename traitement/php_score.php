<?php
$bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
//Rajouter conditions apparition du score

    function score($p, $c, $t)
        {
            //Donnée récupérée au début du jeu
            $p = 3;
            //Données récupérées à la fin du jeu
            $c = 7;
            $t = 8;
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
                if(isset($score, $_SESSION["id"]) && $score>=0)
                    {
                        $id_user = $_SESSION["id"];
                        
                        $insert_score = $bdd->prepare('INSERT INTO score (id_user, score, nb_paires, temps, coups) VALUES (?,?,?, ?,?)');
                        $insert_score->execute([$id_user, $score, $p]);
                        
                        $prepare_add_score = $bdd->prepare('SELECT SUM(score) as total_score FROM score WHERE id_user=?');
                        $prepare_add_score->execute([$id_user]);
                        $add_score = $prepare_add_score->fetchAll(PDO::FETCH_ASSOC);

                        $update_score = $bdd->prepare('UPDATE utilisateurs SET score_total=? WHERE id=?');
                        $update_score->execute([$add_score['total_score'], $id_user]);
                    }     
            return $score;                          
        }
    
?>