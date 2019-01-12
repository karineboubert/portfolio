<header>

    <nav class="navbar navbar-expand-lg navbar-light background-grey">
        <div class=" col-6 col-md-4 col-lg-3 col-xl-6">
            <a class="navbar-brand" href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"/></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-md-8 col-xl-4">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?admin=user">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown open">
                            <button class="btn greyButton dropdown-toggle nav-link"
                                    type="button" id="dropdownMenu5" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                FAQ
                            </button>
                            <div class="dropdown-menu">
                                <a class="nav-link" href="index.php?admin=faq">FAQ</a>
                                <a class="nav-link" href="index.php?admin=categoryFaq">Catégories FAQ</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown open">
                            <button class="btn greyButton dropdown-toggle nav-link"
                                    type="button" id="dropdownMenu5" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Forum
                            </button>
                            <div class="dropdown-menu">
                                <a class="nav-link" href="index.php?admin=categoryForum">Catégories Forum</a>
                                <a class="nav-link" href="index.php?admin=topic">Topics</a>
                                <a class="nav-link" href="index.php?admin=comment">Commentaires</a>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</header>
