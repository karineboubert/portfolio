<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/contact.css">
    <title>Contact</title>
</head>

<?php require 'partials/header.php'; ?>
<div id="team">
    <div id="bgTeam" class="d-flex justify-content-center align-items-center">
        <div class="Title">
            <h1 class="whiteText center ">Notre équipe & Contact</h1>
            <a class=" whiteText center" href="index.php?page=contact#contact"><h3> Nous contacter</h3></a>
        </div>
    </div>
</div>

<div class=" banner d-flex justify-content-center align-items-center">
    <h3 class="nomargin">A propos de nous</h3>
</div>

<div class="container">
    <div class="row padding">
        <div class="col-md-12 col-lg-6" id="deleteMobile">
            <img id="teamPicture" class="mx-auto d-block noResponsive" src="assets/img/brainstorming.jpg"
                 alt="teamPicture">
        </div>
        <div class="col-md-12 col-lg-6 d-flex row justify-content-left align-items-center responsiveSpace">
            <h6> Notre équipe</h6>
            <p class="text">
                Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                aliquam erat volutpat. Ut wisi enim ad ex ea commodo consequat. Duis autem vel eum iriure dolor in
                hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facili iusto
                odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla
                facilisi.<br/><br/>
                Lorem ipsum dolor sit amet, elit, erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.<br/><br/>
                Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>
</div>


<div class=" banner d-flex align-items-center justify-content-center" id="contact">
    <h3 class="nomargin">Nous contacter</h3>
</div>


<div class="container">
    <div class="row padding">
        <div class="col-md-12 col-lg-6 d-flex flex-column  align-items-center">
            <div class="maps borderBlack">
                <div id="mapToulouse"></div>
            </div>

            <div class="contact d-flex flex-column align-items-center  ">
                <h5> Nous contacter</h5>
                <p> Power28 <br/>
                    10 passage Roquemaurel<br/>
                    31300 TOULOUSE<br/>
                    Tel: 0782 780 350
                </p>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 d-flex flex-column  align-items-center ">
            <div class="maps borderBlack">
                <div id="mapParis"></div>
            </div>

            <div class="contact d-flex flex-column align-items-center ">
                <h5> Nous contacter</h5>
                <p> Power28 <br/>
                    54 rue Custine <br/>
                    75018 PARIS<br/>
                    Tel: 0782 780 350
                </p>
            </div>
        </div>
    </div>
</div>

<h4 class="hs" id="contactForm"> Pour nous contacter</h4>


<form action="index.php?page=contact#contactForm" class="padding" id="contact" method="POST">
    <?php if (isset($alert)): ?>
        <div class="alert alert-danger center" role="alert"><?php echo $alert; ?></div>
    <?php elseif (isset($send)): ?>
        <div class="alert alert-success center" role="alert"><?php echo $send; ?><br/><a href="index.php"> Retour à
                l'accueil </a></div>
    <?php endif; ?>
    <div class="d-flex flex-column">
        <div class="row mb-3 offset-sm-1 nomargin ml">
            <div class="form-group col-sm-10 col-md-5 ">
                <label for="name">Nom et Prénom </label>
                <input class="form-control" type="text" placeholder="Nom et Prénom"
                       value="<?php if (isset($user)): ?> <?php echo $user['lastname'] ?> <?php echo $user['firstname'] ?> <?php endif; ?>"
                       name="name" id=name/>
            </div>
            <div class="form-group col-sm-10 col-md-5 ">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email"
                       value=" <?php if (isset($user)): ?><?php echo $user['email'] ?><?php endif; ?>" type="email"
                       placeholder="Email">
            </div>
        </div>

        <div class="col-sm-10 col-md-10 offset-sm-1">
            <label for="msg">Message</label>
            <textarea class="form-control" name="msg" id="msg"></textarea>
        </div>

        <div class="col-sm-8 offset-sm-2 d-flex flex-column align-items-center padding">
            <input id="submit" class=" btn greyButton" name="submit" type="submit" value="Send">
        </div>
    </div>
</form>

<script>
    $(function () {
        $("#contact .button").click(function () {
            var data = {
                name: $("#name").val(),
                email: $("#email").val(),
                msg: $("#msg").val()
            };
            $.ajax({
                type: "POST",
                url: "contact.php",
                data: data,
                success: function () {
                    $('.success').fadeIn(1000);
                }
            });
            return false;
        });
    });
</script>

<?php require 'partials/footer.php'; ?>


</body>
</html>