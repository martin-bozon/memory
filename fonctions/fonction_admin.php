<?php
    function uploadImage($bdd)
        {            
            //Récupération de l'image
            if(isset($_POST["valid_img"], $_FILES["paires"]) && !empty($_FILES["paires"]["name"]))
                {        
                    $taillemax = 3097152;//Définie la taille en octet 
                    $extensionValides = ['jpg', 'jpeg' , 'png'];

                    if($_FILES["paires"]["size"] <= $taillemax)
                        {
                            $extensionUpload = strtolower(substr(strrchr($_FILES["paires"]["name"], '.'),1));
                            //passe la chaine de caractère en minuscule
                            //retourne un segment de la chaine
                            //récupère tout ce qui se trouve après le point
                            
                            if(in_array($extensionUpload, $extensionValides))
                                {                                   
                                    $chemin = 'src/images/paires/' . $_FILES["paires"]["name"];//Définie le chemin jusqu'à l'image
                                    $move = move_uploaded_file($_FILES["paires"]["tmp_name"], $chemin);//upload l'image dans le dossier du site à l'endroit voulu

                                    if($move)
                                        {                               
                                            $uploaodFile = $bdd->prepare('INSERT INTO paires (chemin) VALUES (:chemin)');
                                            $uploaodFile->execute(['chemin' => $chemin]);//Insère le chemin dans la bdd                                            
                                        }
                                    else
                                        {
                                            throw new Exception ('message erreur importation');
                                        }
                                }
                            else
                                {
                                    throw new Exception ('message erreur format');
                                }
                        }
                    else
                        {
                            throw new Exception ('message erreur taille');
                        }
                }
        }

    // class pagination
    function prepaPagination($p, $t, $g, $o)//nombre par page, table choisie, numero de la page, colonne pour le tri
        {                                  
            $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
            //Récupère les users avec une pagination
                                      
            $query_count = $bdd->query("SELECT COUNT(id) as count_ FROM $t");
            $count = $query_count->fetch();
            
           $nb_total = $count["count_"];                     
           $nb_page = ceil($nb_total/$p);

           if(!empty($g) && $g>0 && $g<=$nb_page)
                {
                    $page = (int) strip_tags($g);
                }
            else
                {
                    $page = 1;
                }  
            
            $a_partir_du = (($page-1)*$p);

            if($t == 'score')
                {
                    $query_recup = $bdd->query("SELECT score.id, score, login, score.nb_paires FROM utilisateurs INNER JOIN score ON utilisateurs.id=score.id_user ORDER BY $o DESC LIMIT $a_partir_du, $p");
                    $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
                    $nb_ = count($recup);                   
                }
            else    
                {
                    $query_recup = $bdd->query("SELECT * FROM $t ORDER BY $o ASC LIMIT $a_partir_du, $p");
                    $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
                    $nb_ = count($recup);                      
                }           
            $infos['recup'] = $recup;
            $infos['compte'] = $nb_;
            $infos['nb_total'] = $nb_total;
            $infos['nb_page'] = $nb_page;
            $infos['par_page'] = $p;            
            $infos['page'] = $page;            
            return $infos;
        }
    function pagination($pp ,$nt, $n, $p, $s, $a='')
        {            
            if($nt>$pp)
                {                  
                ?>
                <section id="affiche_pagi">
                    <section>
                        <?php
                            if($p>1)
                                {                                                               
                                    ?>
                                    <a href="admin.php?<?= $s ?>=<?=$p-1 ?><?= $a ?>">Précédent</a>
                                    <?php
                                }
                            else
                                {                                
                                    ?>
                                    <p></p>
                                    <?php
                                }
                        ?>
                    </section>                
                    <section>
                        <?php
                            if($p < $n)
                                {                               
                                    ?>
                                    <a href="admin.php?<?= $s ?>=<?= $p+1 ?><?= $a ?>">Suivant</a>
                                    <?php
                                }                       
                        ?>
                    </section>
                </section>
                
                <?php
            }
        }        
?>