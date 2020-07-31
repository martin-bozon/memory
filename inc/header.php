<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <div><a class="text-decoration-none" href="Index.php">Accueil</a></div>
        <div class="<?= (App::getAuth()->user()) ? '' : 'd-none' ?>"><a class="text-decoration-none" href="memory.php">Memory</a>
        </div>
        <div><a class="text-decoration-none" href="fame.php">Wall of fame</a></div>
        <div class="dropdown <?= (App::getAuth()->user()) ? '' : 'd-none' ?>">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Mon compte
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button"><a class="text-decoration-none" href="historique.php">Voir
                        historique</a></button>
                <button class="dropdown-item" type="button"><a class="text-decoration-none" href="profil.php">Modifier
                        mon compte</a></button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" type="button"><a class="text-decoration-none" href="logout.php">Déconnexion</a>
                </button>
            </div>
        </div>
        <div class="<?= (App::getAuth()->user()) ? 'd-none' : '' ?>"><a class="text-decoration-none"
                                                                        href="connexion.php">Connexion</a></div>
        <div class="<?= (App::getAuth()->user()) ? 'd-none' : '' ?>"><a class="text-decoration-none"
                                                                        href="inscription.php">Inscription</a></div>
    </div>

</nav>
