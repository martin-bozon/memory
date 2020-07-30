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
                                            throw new Exception('Image uplodaer');
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
    function prepaPagination($p, $t, $g, $o)
        {                       
            $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
            //Récupère les users avec une pagination
            $getStart = (empty($g))? '' : $g;            
            $par_page = $p;
            $query_count = $bdd->query("SELECT COUNT(id) as count_ FROM $t");
            $count = $query_count->fetch();
            
           $nb_ = $count["count_"];
           $nb_page = ceil($nb_/$par_page);

           if(!empty($getStart) && $getStart>0 && $getStart<=$nb_page)
                {
                    $page = (int) strip_tags($getStart);
                }
            else
                {
                    $page = 1;
                }  
            
            $a_partir_du = (($page-1)*$par_page);

            if($t == 'score')
                {
                    $query_recup = $bdd->query("SELECT score.id, score, login, score.nb_paires FROM utilisateurs INNER JOIN score ON utilisateurs.id=score.id_user ORDER BY $o DESC LIMIT $a_partir_du, $par_page");
                    $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
                    $nb_ = count($recup); 
                }
            else    
                {
                    $query_recup = $bdd->query("SELECT * FROM $t ORDER BY $o ASC LIMIT $a_partir_du, $par_page");
                    $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
                    $nb_ = count($recup);    
                }           
            $infos['recup'] = $recup;
            $infos['compte'] = $nb_;
            $infos['par_page'] = $p;
            $infos['nb'] = $nb_;
            $infos['page'] = $page;            
            return $infos;
        }
    function pagination($pp, $nb, $p)
        {
            echo ($pp);
            echo ($nb);
            echo($p);
        }
?>