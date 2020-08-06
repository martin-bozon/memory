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
                                    //Vérifie que l'image n'est pas déjà dans la bdd
                                    $verif_chemin = $bdd->query('SELECT * FROM card WHERE image_path=?', [$chemin])->fetch(PDO::FETCH_ASSOC);
                                    if(empty($verif_chemin))
                                        {
                                             $move = move_uploaded_file($_FILES["paires"]["tmp_name"], $chemin);//upload l'image dans le dossier du site à l'endroit voulu

                                            if($move)
                                                {                                                                                              
                                                    $uploaodFile = $bdd->query('INSERT INTO card (image_path) VALUES (?)', [$chemin]);
                                                }
                                            else
                                                {
                                                    throw new Exception ('message erreur importation');
                                                }
                                        }
                                    else
                                        {
                                            throw new Exception ('Le fichier existe déjà');
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
    function prepaPagination($p, $t, $g, $o, $bdd)//nombre par page, table choisie, numero de la page, colonne pour le tri
        {                                                                                    
            // $query_count = $bdd->query("SELECT COUNT(id) as count_ FROM $t");
            // $count = $query_count->fetch();
            $count = $bdd->query("SELECT COUNT(id) as count_ FROM $t")->fetch(PDO::FETCH_ASSOC);
            
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
                    // $query_recup = $bdd->query("SELECT score.id, score, login, score.nb_paires FROM utilisateurs INNER JOIN score ON utilisateurs.id=score.id_user ORDER BY $o DESC LIMIT $a_partir_du, $p");
                    // $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
                    $recup = $bdd->query("SELECT score.id, score, username, score.nb_paires FROM utilisateurs INNER JOIN score ON utilisateurs.id=score.id_user ORDER BY $o DESC LIMIT $a_partir_du, $p")->fetchAll(PDO::FETCH_ASSOC);
                    $nb_ = count($recup);                   
                }
            else    
                {
                    // $query_recup = $bdd->query("SELECT * FROM $t ORDER BY $o ASC LIMIT $a_partir_du, $p");
                    // $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
                    $recup = $bdd->query("SELECT * FROM $t ORDER BY $o ASC LIMIT $a_partir_du, $p")->fetchAll(PDO::FETCH_ASSOC);
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
                                    <a class="button" href="admin.php?<?= $s ?>=<?=$p-1 ?><?= $a ?>">Précédent</a>
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
                                    <a class="button" href="admin.php?<?= $s ?>=<?= $p+1 ?><?= $a ?>">Suivant</a>
                                    <?php
                                }                       
                        ?>
                    </section>
                </section>
                
                <?php
            }
        }        
?>