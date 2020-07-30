<?php
    session_start();
    include 'traitement/php_admin.php';    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<body>
    <main id="main_admin">
        <h2>Gestion Jeu</h2>
        <section id="user_score">           
            <table class="table table_admin">
                <thead class="thead-dark">        
                    <tr>
                        <th colspan="2">Utilisateurs</th>       
                    </tr>       
                                        
                </thead>
                <tbody>
                    <tr class="bg-info text-white">
                        <td class="border">Utilisateur</td>
                        <td class="border sup">Supprimer</td>
                    </tr>                
                    <?php
                        for($i=0; $i<$info_users['compte']; $i++)
                            {
                                ?>
                                <tr>                    
                                    <td class="border"><?=  $info_users['recup'][$i]['login'] ?></td>
                                    <td class="border sup"><button><a class="icon-trash" href="traitement/suppression.php?id_user=<?= $info_users['recup'][$i]["id"] ?>" title="supprimer" onclick="return confirm('Supprimer : <?=$info_users['recup'][$i]['login'] ?> ?')"><img src="src/images/trash.png" alt="logo poubelle"></a></button></td>
                                </tr>   
                                <?php
                            }                
                    ?>            
                </tbody>
            </table>           
            <?php pagination($pp_user, $nb_user, $p_user); ?>
            <table class="table table_admin">
                <thead class="thead-light">
                    <tr>
                    <th colspan="4">Score</th>                
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-info text-white">
                        <td class="border">Utilisateur</td>
                        <td class="border">Score</td>
                        <td class="border">Nombres de paires</td>
                        <td class="border sup">Supprimer</td>
                    </tr>
                    <?php
                        for($i=0; $i< $info_scores["compte"]; $i++)
                            {
                                ?>
                                <tr>
                                    <td class="border"><?=  $info_scores["recup"][$i]['login'] ?></td>
                                    <td class="border"><?=  $info_scores["recup"][$i]['score'] ?></td>
                                    <td class="border"><?=  $info_scores["recup"][$i]['nb_paires'] ?></td>
                                    <td class="border sup"><button><a class="icon-trash" href="traitement/suppression.php?id_score=<?= $info_scores["recup"][$i]["id"] ?>" title="supprimer" onclick="return confirm('Supprimer : Ce score ?')"><img src="src/images/trash.png" alt="logo poubelle"></a></button></td>                                                                               
                                </tr>
                                <?php                    
                            }
                    ?>
                </tbody>
            </table>         
            <?php pagination($pp_score, $nb_score, $p_score); ?>   
        </section>        
        <h2>Gestion paires</h2>
        <section id="ad_paires">            
            <section id="form_paires">
                <h2>Ajouter une paire</h2>
                <?php
                    if(isset($e))
                        {
                            echo $e->getMessage();
                        }  
                ?>
                <form enctype="multipart/form-data" action="" method="POST">
                    <section>
                        <label for="image">Choix de l'image</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" id="image">        
                        <input type="file" name="paires" accept=".jpg, .png, .jpeg"/>
                    </section>            
                    <input class="btn btn-primary" type="submit" name="valid_img" value="Envoyer">           
                </form>       
            </section>        
            <table class="table table-striped table_paires">
                <thead>                
                        <th class="bg-secondary text-white" colspan="2">Vos paires : <?= $info_paires["compte"]?></th>                            
                </thead>
                <tbody>          
                    <tr class="bg-info text-white">                    
                        <td class="border">Image</td>
                        <td class="border sup">Supprimer</td>
                    </tr>             
                        <?php                    
                            for($i=0; $i<$info_paires["compte"]; $i++) 
                                {                               
                                    ?>
                                    <tr>                                   
                                        <td class="border"><img class="paires_admin" src="<?= $info_paires["recup"][$i]["chemin"] ?>" alt="photo paires"></td>      
                                        <td class="border sup"><button><a class="icon-trash" href="traitement/suppression.php?id_paires=<?= $info_paires["recup"][$i]["id"] ?>" title="supprimer" onclick="return confirm('Supprimer : Cette paire ?')"><img src="src/images/trash.png" alt="logo poubelle"></a></button></td>                                                                               
                                    </tr> 
                                    <?php
                                }
                        ?>                                      
                </tbody>
            </table>        
            <?php pagination($pp_paire, $nb_paire, $p_paire); ?>
        </section>
    </main>
</body>
</html>