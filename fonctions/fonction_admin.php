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
    function paginationDix($p, $t, $g)
        {                       
            $bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
            //Récupère les users avec une pagination
            $getStart = (empty($g))? '' : $g;
            $table = $t;
            $par_page = $p;
            $query_count = $bdd->query("SELECT COUNT(id) as count_ FROM $table");
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

            $query_recup = $bdd->query("SELECT * FROM $table ORDER BY id ASC LIMIT $a_partir_du, $par_page");
            $recup = $query_recup->fetchAll(PDO::FETCH_ASSOC); 
            $nb_ = count($recup);    
            $infos['recup'] = $recup;
            $infos['compte'] = $nb_;            
            return $infos;
        }
?>