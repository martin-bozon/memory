<nav class="navbar_media navbar_header position-absolute">
    <div class="flex-grow-1"><a class="text-decoration-none <?= $page_selected == 'index' ? 'navbar_selected' : '' ?>"
                                href="Index.php">ACCUEIL</a></div>
    <div class="<?= (App::getAuth()->user(
    )) ? '' : 'd-none' ?> <?= $page_selected == 'memory' ? 'navbar_selected' : '' ?> flex-grow-1"><a
                class="text-decoration-none" href="memory.php">MEMORY</a>
    </div>
    <div class="flex-grow-1"><a class="text-decoration-none <?= $page_selected == 'fame' ? 'navbar_selected' : '' ?>"
                                href="fame.php">WALL OF FAME</a></div>
    <div class="dropdown <?= (App::getAuth()->user(
    )) ? '' : 'd-none' ?> <?= $page_selected == 'admin' || $page_selected == 'historique' || $page_selected == 'profil' ? 'navbar_selected' : '' ?> flex-grow-1">
        <div class="dropdown-toggle account" type="button" id="dropdownMenu2" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            MON COMPTE
        </div>
        <div class="dropdown-menu"
             aria-labelledby="dropdownMenu2">
            <button class="dropdown-item <?= (App::getAuth()->user()->is_admin == 1) ? '' : 'd-none' ?>"
                    type="button"><a class="text-decoration-none" href="admin.php">Espace
                    administrateur</a></button>
            <button class="dropdown-item" type="button"><a class="text-decoration-none" href="historique.php">Voir
                    historique</a></button>
            <button class="dropdown-item" type="button"><a class="text-decoration-none" href="profil.php">Modifier
                    mon compte</a></button>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" type="button"><a class="text-decoration-none"
                                                           href="logout.php">Déconnexion</a>
            </button>
        </div>
    </div>
    <div class="<?= (App::getAuth()->user(
    )) ? 'd-none' : '' ?> <?= $page_selected == 'connexion' ? 'navbar_selected' : '' ?> flex-grow-1"><a
                class="text-decoration-none"
                href="connexion.php">CONNEXION</a></div>
    <div class="<?= (App::getAuth()->user(
    )) ? 'd-none' : '' ?> <?= $page_selected == 'inscription' ? 'navbar_selected' : '' ?> flex-grow-1"><a
                class="text-decoration-none"
                href="inscription.php">INSCRIPTION</a></div>
</nav>


<nav class="navbar_screen navbar_header position-absolute">
    <div class="d-flex flex-column w-100">
        <div class="dropdown w-100 <?= (App::getAuth()->user(
        )) ? '' : 'd-none' ?> <?= $page_selected == 'admin' || $page_selected == 'historique' || $page_selected == 'profil' ? 'navbar_selected' : '' ?> flex-grow-1">
            <div class="dropdown-toggle account w-100" type="button" id="dropdownMenu3" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                <img src="../src/images/LfromLoL.png" class="logoL">
            </div>
            <div class="dropdown-menu"
                 aria-labelledby="dropdownMenu3">
                <button class="flex-grow-1"><a
                            class="text-decoration-none <?= $page_selected == 'index' ? 'navbar_selected' : '' ?>"
                            href="Index.php">ACCUEIL</a></button>
                <button class="<?= (App::getAuth()->user(
                )) ? '' : 'd-none' ?> <?= $page_selected == 'memory' ? 'navbar_selected' : '' ?> flex-grow-1"><a
                            class="text-decoration-none" href="memory.php">MEMORY</a>
                </button>
                <button class="flex-grow-1"><a
                            class="text-decoration-none <?= $page_selected == 'fame' ? 'navbar_selected' : '' ?>"
                            href="fame.php">WALL OF FAME</a></button>

                <button class="dropdown-item <?= (App::getAuth()->user()->is_admin == 1) ? '' : 'd-none' ?>"
                        type="button"><a class="text-decoration-none" href="admin.php">Espace
                        administrateur</a></button>
                <button class="dropdown-item" type="button"><a class="text-decoration-none" href="historique.php">Voir
                        historique</a></button>
                <button class="dropdown-item" type="button"><a class="text-decoration-none" href="profil.php">Modifier
                        mon compte</a></button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" type="button"><a class="text-decoration-none"
                                                               href="logout.php">Déconnexion</a>
                </button>
            </div>
        </div>
        <div class="<?= (App::getAuth()->user(
        )) ? 'd-none' : '' ?> <?= $page_selected == 'connexion' ? 'navbar_selected' : '' ?> flex-grow-1"><a
                    class="text-decoration-none"
                    href="connexion.php">CONNEXION</a></div>
        <div class="<?= (App::getAuth()->user(
        )) ? 'd-none' : '' ?> <?= $page_selected == 'inscription' ? 'navbar_selected' : '' ?> flex-grow-1"><a
                    class="text-decoration-none"
                    href="inscription.php">INSCRIPTION</a></div>
    </div>
</nav>