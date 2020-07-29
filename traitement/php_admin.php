<?php
//A supprimer plus tard, il y'aura une connexion unique
$bdd = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
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
                                echo 'message erreur importation';
                            }
                    }
                else
                    {
                        echo 'message erreur format';
                    }
            }
        else
            {
                echo 'message erreur taille';
            }
    }
?> 