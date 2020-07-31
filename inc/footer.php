<?php
    if(isset($_SESSION["user"]))
        {
            ?>
            <footer class="page-footer font-small blue pt-4">
                <section class="container-fluid text-center text-md-left">
                    <section class="row">
                        <section class="col-md-6 mt-md-0 mt-3">     
                            <h5 class="text-uppercase">Jeu du memory</h5>   
                            <p>Venez tester votre mémoire et votre rapidité</p>                             
                        </section>
                            <hr class="clearfix w-100 d-md-none pb-3">
                        <section class="col-md-3 mb-md-0 mb-3">   
                            <h5 class="text-uppercase">Jeu</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../memory.php">Memory</a>
                                    </li>
                                    <li>
                                        <a href="../fame.php">Wall of fame</a>
                                    </li>                                   
                                </ul>
                        </section>
                        <section class="col-md-3 mb-md-0 mb-3">
                            <h5 class="text-uppercase">Joueur</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../profil.php">Mon profil</a>
                                    </li>
                                    <li>
                                        <a href="../historique.php">Historique</a>
                                    </li>                                    
                                </ul>
                        </section>    
                    </section>
                </section>                  
                <section class="footer-copyright text-center py-3 bg_footer">
                    <p>© 2020 Copyright: Céline Pawlak - Martin Bozon</p>
                </section>
            </footer>
            <?php
        }    
    else if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1)
        {
            ?>
            <footer class="page-footer font-small bg-blue pt-4">
                <section class="container-fluid text-center text-md-left">
                    <section class="row">
                        <section class="col-md-6 mt-md-0 mt-3">     
                            <h5 class="text-uppercase">Jeu du memory</h5>   
                            <p>Venez tester votre mémoire et votre rapidité</p>                             
                        </section>
                            <hr class="clearfix w-100 d-md-none pb-3">
                        <section class="col-md-3 mb-md-0 mb-3">   
                            <h5 class="text-uppercase">Jeu</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../memory.php">Memory</a>
                                    </li>
                                    <li>
                                        <a href="../fame.php">Wall of fame</a>
                                    </li>                                   
                                </ul>
                        </section>
                        <section class="col-md-3 mb-md-0 mb-3">
                            <h5 class="text-uppercase">Joueur</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../profil.php">Mon profil</a>
                                    </li>
                                    <li>
                                        <a href="../historique.php">Historique</a>
                                    </li>    
                                    <li>
                                        <a href="../admin.php">Administrateur</a>
                                    </li>                                  
                                </ul>
                        </section>    
                    </section>
                </section>                  
                <section class="footer-copyright text-center py-3 bg_footer">
                    <p>© 2020 Copyright: Céline Pawlak - Martin Bozon</p>
                </section>
            </footer>
            <?php
        }
    else
        {
            ?>           
            <footer class="page-footer font-small bg-secondary pt-4">
                <section class="container-fluid text-center text-md-left">
                    <section class="row">
                        <section class="col-md-6 mt-md-0 mt-3">     
                            <h5 class="text-uppercase">Jeu du memory</h5>    
                            <p>Venez tester votre mémoire et votre rapidité</p>                            
                        </section>
                            <hr class="clearfix w-100 d-md-none pb-3">
                        <section class="col-md-3 mb-md-0 mb-3">   
                            <h5 class="text-uppercase">Accueil</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../index.php">Accueil</a>
                                    </li>                                    
                                </ul>
                        </section>
                        <section class="col-md-3 mb-md-0 mb-3">
                            <h5 class="text-uppercase">Joueur</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../inscription.php">Inscription</a>
                                    </li>
                                    <li>
                                        <a href="../connexion.php">Connexion</a>
                                    </li>                                    
                                </ul>
                        </section>    
                    </section>
                </section>                  
                <section class="footer-copyright text-center py-3 bg_footer">
                    <p>© 2020 Copyright: Céline Pawlak - Martin Bozon</p>
                </section>
            </footer>
            <?php
        }
?>