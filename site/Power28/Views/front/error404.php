<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Erreur404</title>
</head>
<body>
<?php require 'partials/header.php'; ?>
        <div class="margin404 d-flex justify-content-around align-items-center flex-row flex-wrap">

            <img class="col-md-11 col-lg-6 nopadding nomargin" id="error" src="assets/img/error.png">

            <div class="col-md-12 col-lg-5 d-flex flex-column align-items-center">
                <h1> Oups !</h1><br/>
                <h3 class="center"> Cette page est introuvable !</h3><br/>
                <h4><u>Lien de redirection :</u></h4>
                <div class="col-md-12 col-lg-12 nomargin d-flex justify-content-center">
                    <a class="blackButton bold" href="index.php"> Accueil </a>
                    <a class="blackButton bold" href="index.php?page=topic_list"> Topics </a>
                </div>
            </div>
        </div>

<?php require 'partials/footer.php'; ?>
</body>
</html>

