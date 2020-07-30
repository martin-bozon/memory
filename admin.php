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
    <section class="table_admin">
        <table class="table">
            <thead class="thead-dark">        
                <tr>
                    <th colspan="2">Utilisateurs</th>       
                </tr>       
                                      
            </thead>
            <tbody>
                <tr class="bg-info text-white">
                    <td class="border">Utilisateur</td>
                    <td class="border">Supprimer</td>
                </tr>                
                <?php
                    for($i=0; $i<$nb_users; $i++)
                        {
                            ?>
                            <tr>                    
                                <td class="border"><?= $recup_users[$i]['login'] ?></td>
                                <td class="border"><button><a class="icon-trash" href="traitement/suppression.php?id_user=<?= $recup_users[$i]["id"] ?>" title="supprimer" onclick="return confirm('Supprimer : <?= $recup_users[$i]['login'] ?> ?')"><img src="src/images/trash.png" alt="logo poubelle"></a></button></td>
                            </tr>   
                            <?php
                        }                
                ?>            
            </tbody>
        </table>
    </section>
    <section class="table_admin">
        <table class="table">
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
                    <td class="border">Supprimer</td>
                </tr>
                <?php
                    for($i=0; $i<$nb_score; $i++)
                        {
                            ?>
                            <tr>
                                <td class="border"><?= $recup_score[$i]['login'] ?></td>
                                <td class="border"><?= $recup_score[$i]['score'] ?></td>
                                <td class="border"><?= $recup_score[$i]['nb_paires'] ?></td>
                                <td class="border"><button><a class="icon-trash" href="traitement/suppression.php?id_score=<?= $recup_score[$i]["id"] ?>" title="supprimer" onclick="return confirm('Supprimer : Ce score ?')"><img src="src/images/trash.png" alt="logo poubelle"></a></button></td>                                                                               
                            </tr>
                            <?php                    
                        }
                ?>
            </tbody>
        </table>
    </section>
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
                    <th class="bg-secondary text-white" colspan="2">Vos paires : <?= $nb_paires_total?></th>                            
            </thead>
            <tbody>          
                <tr class="bg-info text-white">                    
                    <td class="border">Image</td>
                    <td class="border">Supprimer</td>
                </tr>             
                    <?php                    
                        for($i=0; $i<$nb_paires_total; $i++) 
                            {                               
                                ?>
                                <tr>                                   
                                    <td class="border"><img class="paires_admin" src="<?= $recup_paires[$i]["chemin"] ?>" alt="photo paires"></td>      
                                    <td class="border"><button><a class="icon-trash" href="traitement/suppression.php?id_paires=<?= $recup_paires[$i]["id"] ?>" title="supprimer" onclick="return confirm('Supprimer : Cette paire ?')"><img src="src/images/trash.png" alt="logo poubelle"></a></button></td>                                                                               
                                </tr> 
                                <?php
                            }
                    ?>                                      
            </tbody>
        </table>
    </section>
    </main>
</body>
</html>