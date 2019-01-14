<?php require_once 'tools/db.php';

if(isset($_POST['login'])){

    if(empty($_POST['email']) OR empty($_POST['password'])){
    $message = "Merci de remplir tous les champs";
    }
    else{
    $query = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
    $query->execute( array( $_POST['email'], hash('md5', $_POST['password']), ) );
    $user = $query->fetch();

        if($user){
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['users'] = $user['firstname'];
            $_SESSION['userId'] = $user['id'];
        }
        else{
            $message = "Mauvais identifiants";
        }
    }
}
//en cas d'enregistrement
if(isset($_POST['register'])){

    $query = $db->prepare('SELECT email FROM user WHERE email = ?');
	$query->execute(array($_POST['email']));

	$userAlreadyExists = $query->fetch();

	if($userAlreadyExists){
		$messageregister = "Adresse email déjà enregistrée";
	}
	elseif(empty($_POST['firstname']) OR empty($_POST['lastname'])  OR empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['address']) OR empty($_POST['date_of_birth']) OR empty($_POST['mobile']) OR empty($_POST['city']) OR empty($_POST['postal_code'])){
        $messageregister = "Merci de remplir tous les champs obligatoires (*)";
    }
    elseif($_POST['password'] != $_POST['password_confirm']) {

        $messageregister = "Les deux mots de passe que vous avez rentrés ne correspondent pas…";
    }
    else {
	    $query = $db->prepare('INSERT INTO user (firstname, lastname, email, password, address, date_of_birth, mobile, city, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $newUser = $query->execute(
        [
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            hash('md5', $_POST['password']),
            $_POST['address'],
            $_POST['date_of_birth'],
            $_POST['mobile'],
            $_POST['city'],
            $_POST['postal_code']
        ]
        );

        $_SESSION['admin'] = 0;
		$_SESSION['users'] = $_POST['firstname'];
    }
}

if(isset($_SESSION['users'])){
header('location:index.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Connexion/Inscription</title>
</head>
<body>
<?php require 'partials/header.php'; ?>


<div class="container">

    <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?php if(isset($_POST['login']) || !isset($_POST['register'])): ?>active<?php endif; ?>" data-toggle="tab" href="#login" role="tab">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if(isset($_POST['register'])): ?>active<?php endif; ?>" data-toggle="tab" href="#register" role="tab">Inscription</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane container-fluid <?php if(isset($_POST['login']) || !isset($_POST['register'])): ?>active<?php endif; ?>" id="login" role="tabpanel">

            <form action="connexion.php" method="post" class="p-4 row flex-column">

                <h4 class="pb-4 col-sm-8 offset-sm-2">Connexion</h4>

                <?php if(isset($message)): ?>
                    <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $message; ?></div>
                <?php endif; ?>

                <div class="form-group col-sm-8 offset-sm-2">
                    <label for="email">Email</label>
                    <input class="form-control" value="" type="email" placeholder="Email" name="email" id="email" />
                </div>

                <div class="form-group col-sm-8 offset-sm-2">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" value="" type="password" placeholder="Mot de passe" name="password" id="password" />
                </div>

                <div class="text-right col-sm-8 offset-sm-2">
                    <input class="btn blue" type="submit" name="login" value="Valider" />
                </div>
            </form>

        </div>
        <div class="tab-pane container-fluid <?php if(isset($_POST['register'])): ?>active<?php endif; ?>" id="register" role="tabpanel">

            <form action="connexion.php" method="post" class="p-4 row flex-column">

                <h4 class="pb-4 col-sm-8 offset-sm-2">Inscription</h4>

                <?php if(isset($messageregister)): ?>
                    <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $messageregister; ?></div>
                <?php endif; ?>

                <div class="form-group col-sm-8 offset-sm-2">
                    <label for="firstname">Prénom <b class="text-danger">*</b></label>
                    <input class="form-control" value="" type="text" placeholder="Prénom" name="firstname" id="firstname" />
                </div>
                <div class="form-group col-sm-8 offset-sm-2">
                    <label for="lastname">Nom de famille <b class="text-danger">*</b> </label>
                    <input class="form-control" value="" type="text" placeholder="Nom de famille" name="lastname" id="lastname" />
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
                <div class="row">
                    <div class="form-group col-sm-4 offset-sm-2">
                        <label for="postal_code">Code Postal<b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" name="postal_code" id="postal_code" />
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label for="city">Ville <b class="text-danger">*</b></label>
                        <input class="form-control"  type="text" name="city" id="city" />
                    </div>
                </div>

                <div class="form-group col-sm-8 offset-sm-2">
                    <label for="date_of_birth">Date d'anniversaire <b class="text-danger">*</b></label>
                    <input class="form-control"  type="date" name="date_of_birth" id="date_of_birth" />
                </div>
                <div class="form-group col-sm-8 offset-sm-2">
                    <label for="mobile">Téléphone <b class="text-danger">*</b></label>
                    <input class="form-control"  type="tel" name="mobile" id="mobile" />
                </div>

                <div class="text-right col-sm-8 offset-sm-2">
                    <p class="text-danger">* champs requis</p>
                    <input class="btn blue" type="submit" name="register" value="Enregistrer" />
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
