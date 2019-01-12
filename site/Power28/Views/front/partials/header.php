<header>
    <nav class="navbar navbar-expand-lg navbar-light background-grey">
        <div class=" col-6 col-md-4 col-lg-3 col-xl-6">
            <a class="navbar-brand" href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"/></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-6 col-md-8 col-lg-6 col-xl-6">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=functionalities">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=price">Prix</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown open">
                            <button class="btn bannerutton dropdown-toggle nav-link"
                                    type="button" id="dropdownMenu5" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Nous
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index.php?page=contact">A propos de nous</a>
                                <a class="dropdown-item" href="index.php?page=contact#contact">Contact</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown open">
                            <button class="btn bannerutton dropdown-toggle nav-link"
                                    type="button" id="dropdownMenu5" data-toggle="dropdown"
                                    aria-expanded="false">
                                Vos questions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index.php?page=FAQ">FAQ</a>
                                <a class="dropdown-item" href="index.php?page=forum">Forum</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user'])): ?>
                        <div class="dropdown open">
                            <button class="btn bannerutton dropdown-toggle nav-link"
                                    type="button" id="dropdownMenu5" data-toggle="dropdown"
                                    aria-expanded="false">
                                Votre compte <?php echo $_SESSION['user']; ?> !
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index.php?logout">Déconnexion</a>
                                <?php if ($_SESSION['is_admin'] == 1): ?>
                                    <a class="dropdown-item" href="index.php?admin">Administration</a>
                                <?php else: ?>
                                    <a class="dropdown-item" href="index.php?page=user-profile">Profil</a>
                                <?php endif; ?>
                            </div>

                            <?php else: ?>
                                <a class="nav-link" href="index.php?page=login-register">Connexion/Inscription</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

