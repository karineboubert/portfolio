<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/login-register.css">
    <title>Connexion/Inscription</title>
</head>

<?php require 'partials/header.php'; ?>
<body>

<div class="container d-flex justify-content-center ">

    <div class=" col-md-12 col-lg-7 block">
        <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php if(isset($_POST['login']) || !isset($_POST['register'])): ?>active<?php endif; ?>" data-toggle="tab" href="#login" role="tab">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(isset($_POST['register'])): ?>active<?php endif; ?>" data-toggle="tab" href="#register" role="tab">Inscription</a>
            </li>
        </ul>
        <img class="logoPower28 mx-auto d-block padding" src="assets/img/logo.png" alt="logo">

        <div class="tab-content">
            <div class="tab-pane container-fluid <?php if(isset($_POST['login']) || !isset($_POST['register'])): ?>active<?php endif; ?>" id="login" role="tabpanel">

                <form action="index.php?page=login-register" method="post" class="flex-column p-3">

                    <?php if(isset($loginMessage)): ?>
                        <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $loginMessage; ?></div>
                    <?php endif; ?>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="email">Email</label>
                        <input class="form-control" value="" type="email" placeholder="Email" name="email" id="email" />
                    </div>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="password">Mot de passe</label>
                        <input class="form-control" value="" type="password" placeholder="Mot de passe" name="password" id="password" />
                    </div>

                    <div class="col-sm-8 offset-sm-2 d-flex flex-column align-items-center padding">
                        <input class="btn blackButton" type="submit" name="login" value="CONNEXION" />
                    </div>
                </form>
            </div>

            <div class="tab-pane container-fluid <?php if(isset($_POST['register'])): ?>active<?php endif; ?>" id="register" role="tabpanel">
                <form action="index.php?page=login-register" method="post" class=" row flex-column">

                    <?php if(isset($registerMessage)): ?>
                        <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $registerMessage; ?></div>
                    <?php endif; ?>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="firstname">Prénom <b class="text-danger">*</b></label>
                        <input class="form-control" value="" type="text" placeholder="Prénom" name="firstname" id="firstname" />
                    </div>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="lastname">Nom <b class="text-danger">*</b> </label>
                        <input class="form-control" value="" type="text" placeholder="Nom" name="lastname" id="lastname" />
                    </div>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="company_name">Nom de l'entreprise</label>
                        <input class="form-control" value="" type="text" placeholder="Nom de l'entreprise" name="company_name" id="company_name" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="pseudo">Pseudo<b class="text-danger">*</b></label>
                        <input class="form-control" value="" type="text" placeholder="Pseudo" name="pseudo" id="pseudo" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="email">Email <b class="text-danger">*</b></label>
                        <input class="form-control" value="" type="email" placeholder="Email" name="email" id="email" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="password">Mot de passe <b class="text-danger">*</b></label>
                        <input class="form-control" value="" type="password" placeholder="Mot de passe" name="password" id="password" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="password_confirm">Confirmation du mot de passe <b class="text-danger">*</b></label>
                        <input class="form-control" value="" type="password" placeholder="Confirmation du mot de passe" name="password_confirm" id="password_confirm" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="address">Adresse <b class="text-danger">*</b></label>
                        <textarea class="form-control" name="address" id="address" placeholder="Adresse"></textarea>
                    </div>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="postcode">Code Postal<b class="text-danger">*</b></label>
                        <input class="form-control"  type="text"  name="postcode" placeholder="Code Postal"  id="postcode" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2 ">
                        <label for="city">Ville <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" name="city" placeholder="Ville" id="city" />
                    </div>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="mobile">Numéro de téléphone <b class="text-danger">*</b></label>
                        <input class="form-control"  type="tel" placeholder="Numéro de téléphone" name="mobile" id="mobile" />
                    </div>

                    <div class="col-sm-8 offset-sm-2 d-flex flex-column align-items-center padding">
                        <p class="text-danger">* champs requis</p>
                        <input class="btn blackButton" type="submit" name="register" value="INSCRIPTION" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>

</body>
</html>