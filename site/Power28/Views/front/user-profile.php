<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/login-register.css">
    <title>Modifier mon profil</title>
</head>

<?php require 'partials/header.php'; ?>
<body>

<div class="container d-flex justify-content-center ">
    <div class=" col-md-12 col-lg-7 block">

        <img class="logoPower28 mx-auto d-block padding" src="assets/img/logo.png" alt="logo">

        <form action="index.php?page=user-profile" method="post" class="p-4 row flex-column">

        <h4 class="pb-4 col-sm-8 offset-sm-2 center">Mise à jour des informations utilisateur</h4>

        <?php if(isset($updateMessage)): ?>
            <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $updateMessage; ?></div>
        <?php endif; ?>

            <div class="form-group col-sm-8 offset-sm-2">
                <label for="firstname">Prénom <b class="text-danger">*</b></label>
                <input class="form-control" value="<?php echo $user['firstname']?>" type="text" placeholder="Prénom" name="firstname" id="firstname" />
            </div>

            <div class="form-group col-sm-8 offset-sm-2">
                <label for="lastname">Nom <b class="text-danger">*</b> </label>
                <input class="form-control" value="<?php echo $user['lastname']?>" type="text" placeholder="Nom" name="lastname" id="lastname" />
            </div>

            <div class="form-group col-sm-8 offset-sm-2">
                <label for="company_name">Nom de l'entreprise</label>
                <input class="form-control" value="<?php echo $user['company_name']?>" type="text" placeholder="Nom de l'entreprise" name="company_name" id="company_name" />
            </div>
            <div class="form-group col-sm-8 offset-sm-2">
                <label for="pseudo">Pseudo</label>
                <input class="form-control" value="<?php echo $user['pseudo']?>" type="text" placeholder="Pseudo" name="pseudo" id="pseudo" />
            </div>
            <div class="form-group col-sm-8 offset-sm-2">
                <label for="email">Email <b class="text-danger">*</b></label>
                <input class="form-control" value="<?php echo $user['email']?>" type="email" placeholder="Email" name="email" id="email" />
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
                <textarea class="form-control"  name="address" id="address"> <?php echo $user['address']?></textarea>
            </div>

            <div class="form-group col-sm-8 offset-sm-2">
                <label for="postcode">Code Postal<b class="text-danger">*</b></label>
                <input class="form-control"  value="<?php echo $user['postcode']?>" type="text" placeholder="Code Postal" name="postcode" id="postcode" />
            </div>
            <div class="form-group col-sm-8 offset-sm-2 ">
                <label for="city">Ville <b class="text-danger">*</b></label>
                <input class="form-control" value="<?php echo $user['city']?>"  type="text" placeholder="Ville" name="city" id="city" />
            </div>

            <div class="form-group col-sm-8 offset-sm-2">
                <label for="mobile">Numéro de téléphone <b class="text-danger">*</b></label>
                <input class="form-control" value="<?php echo $user['mobile']?>"  type="tel" placeholder="Numéro de téléphone" name="mobile" id="mobile" />
            </div>

            <div class="col-sm-8 offset-sm-2 d-flex flex-column align-items-center padding">
                <p class="text-danger">* champs requis</p>

                <input class="btn blackButton" type="submit" name="update" value="MODIFIER" />
                <a href="index.php" class="pt-3 titleBlack "> Retour à l'accueil</a>
            </div>
        </form>
    </div>
</div>


    <?php require 'partials/footer.php'; ?>

</body>
</html>