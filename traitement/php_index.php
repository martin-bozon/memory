<?php    
    if(App::getAuth()->user())
        {
            ?>
                <a class="btn btn-primary jeu" href="memory.php">Nouvelle partie</a>                
            <?php
        }
    else
        {
            ?>
                <p><a href="inscription.php">Inscris toi</a> si ce n'est pas déjà fait</p>
                <p>Sinon <a href="connexion.php">connectes</a> toi pour jouer</p>
            <?php
        }
?>