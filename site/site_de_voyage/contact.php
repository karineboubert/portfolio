<?php

if(isset($_POST['mailform']))
{
    if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
    {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"TravelWorld.com"<support@travelworld.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
		<html>
			<body>
				<div align="center">
					<img src="https://www.luxuryhalaltravel.com/voyager/wp-content/uploads/2017/01/one-8-only-mexico-620x388.jpg"/>
					<br/><br/>
					<u>Nom de l\'expéditeur :</u>' .$_POST['name'].'<br/>
					<u>Mail de l\'expéditeur :</u>' .$_POST['mail'].'<br/>
					<br/>
					'.nl2br($_POST['message']).'
					<br/>
				</div>
			</body>
		</html>
		';

        mail("boubertkarine@gmail.com", "CONTACT - TravelWorld.com", $message, $header);
        $msg="Votre message a bien été envoyé ! <a href=\"index.php\" > Accueil </a>";
    }
    else
    {
        $msg="Tous les champs doivent être complétés !";
    }
}
?>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/contact.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <title>TravelWorld</title>
    </head>
</head>
<body>
<?php require 'partials/header.php'; ?>
<div class="container">
    <div class="mentions d-flex align-items-center flex-column">
        <img class="palm" src="assets/img/palmier.jpg">
        <h1>Formulaire de contact !</h1>

        <form method="POST" action="">
            <input class="form" type="text" name="name" placeholder="Votre nom" value="<?php if(isset($_POST['name'])) { echo htmlspecialchars($_POST['name']); } ?>" /><br /><br />
            <input class="form" type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo htmlspecialchars($_POST['mail']); } ?>" /><br /><br />
            <textarea class="form"  name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo htmlspecialchars($_POST['message']); } ?></textarea><br /><br />
            <div class=" d-flex justify-content-end">
                <input class="button" type="submit" value="Envoyer !" name="mailform"/>
            </div>

        </form>

        <?php if(isset($msg)): ?>
            <div class="alert alert-warning">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php require 'partials/footer.php'; ?>

</body>
</html>
