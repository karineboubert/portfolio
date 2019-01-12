<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="col-xl-7 col-md-6 col-5">
        <a class="navbar-brand" href="index.php"><img  id="logo" src="assets/img/logo.png" alt="logo"/></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="col-xl-5 col-md-6 col-7">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">

                <?php if(isset($_SESSION['users'])): ?>
                    <li>
                        <a class="nav-link" href="user-profil.php">Salut <?php echo $_SESSION['users']; ?> !</a>
                    </li>
                   <li>
                       <a class="nav-link" href="index.php?logout">Déconnexion</a>
                       <?php else: ?>
                           <a href="Connexion.php" class="nav-link" >Connexion/ Inscription</a>
                   </li>
                <?php endif; ?>


                <li class="nav-item">
                    <a href="article.php" class="nav-link" >Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Mes voyages</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
