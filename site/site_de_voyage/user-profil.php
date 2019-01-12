<?php
require_once 'tools/db.php';

if(!isset($_SESSION['users'])){
    header('location:../index.php');
    exit;
}
$query = $db->prepare('SELECT * FROM user WHERE id = ?');
$query->execute(array($_SESSION['userId']));

$user = $query->fetch();

if(isset($_POST['update'])){

    $query = $db->prepare('SELECT email FROM user WHERE email = ?');
    $query->execute(array($_POST['email']));

    $emailAlreadyExists = $query->fetch();

    if($emailAlreadyExists && $emailAlreadyExists['email'] != $user['email']){
        $updateMessage = "Adresse email déjà utilisée";
    }
    elseif(empty($_POST['firstname']) OR empty($_POST['email'])){
        $updateMessage = "Merci de remplir tous les champs obligatoires (*)";
    }
    elseif( !empty($_POST['password']) AND ($_POST['password'] != $_POST['password_confirm'])) {
        $updateMessage = "Les mots de passe ne sont pas identiques";
    }
    else {

        $queryString = 'UPDATE user SET
          firstname = :firstname,
          lastname = :lastname,
          email = :email,
          address = :address,
          date_of_birth = :date_of_birth,
          mobile = :mobile,
          city = :city,
          postal_code = :postal_code
          WHERE id = :id
          ';





        $queryParameters =
            [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'date_of_birth' => $_POST['date_of_birth'],
                'mobile' => $_POST['mobile'],
                'city' => $_POST['city'],
                'postal_code' => $_POST['postal_code'],
                'id' => $_SESSION['userId']
            ]
        ;

        //uniquement si l'utilisateur souhaite modifier son mot de passe
        if( !empty($_POST['password'])) {
            //concaténation du champ password à mettre à jour
            $queryString = 'password = :password ';
            //ajout du paramètre password à mettre à jour
            $queryParameters['password'] = hash('md5', $_POST['password']);
        }


        $query = $db->prepare($queryString);
        $result = $query->execute($queryParameters);

        if($result){
            $_SESSION['users'] = $_POST['firstname'];
            $updateMessage = "Informations mises à jour avec succès !";

            $query = $db->prepare('SELECT * FROM user WHERE id = ?');
            $query->execute(array($_SESSION['userId']));
            $user = $query->fetch();
        }
        else{
            $updateMessage = "Erreur";
        }
    }
}

?>

<!DOCTYPE html>
<html>
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
    <title>Profil</title>

</head>
    <body>

        <?php require 'partials/header.php'; ?>

        <div class="container">

            <div class="mentions d-flex align-items-center flex-column">
                <img class="palm" src="assets/img/palmier.jpg">
            </div>

                <form action="user-profil.php" method="post" class="p-4 row flex-column">

                    <h4 class="pb-4 col-sm-8 offset-sm-2">Mise à jour des informations utilisateur</h4>

                    <?php if(isset($updateMessage)): ?>
                        <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $updateMessage; ?></div>
                    <?php endif; ?>

                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="firstname">Prénom <b class="text-danger">*</b></label>
                        <input class="form-control" value="<?php echo $user['firstname']?>" type="text" placeholder="Prénom" name="firstname" id="firstname" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="lastname">Nom de famille</label>
                        <input class="form-control" value="<?php echo $user['lastname'] ?>" type="text" placeholder="Nom de famille" name="lastname" id="lastname" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="email">Email <b class="text-danger">*</b></label>
                        <input class="form-control" value="<?php echo $user['email']?>" type="email" placeholder="Email" name="email" id="email" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="password">Mot de passe (uniquement si vous souhaitez modifier votre mot de passe actuel)</label>
                        <input class="form-control" value="" type="password" placeholder="Mot de passe" name="password" id="password" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="password_confirm">Confirmation du mot de passe (uniquement si vous souhaitez modifier votre mot de passe actuel)</label>
                        <input class="form-control" value="" type="password" placeholder="Confirmation du mot de passe" name="password_confirm" id="password_confirm" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="address">Adresse <b class="text-danger">*</b></label>
                        <textarea class="form-control" name="address" id="address" placeholder="Adresse"><?php echo $user['address']?></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 offset-sm-2">
                            <label for="postal_code">Code Postal<b class="text-danger">*</b></label>
                            <input class="form-control" value="<?php echo $user['postal_code']?>"  type="text" name="postal_code" id="postal_code" />
                        </div>
                        <div class="form-group col-sm-4 ">
                            <label for="city">Ville <b class="text-danger">*</b></label>
                            <input class="form-control" value="<?php echo $user['city']?>"  type="text" name="city" id="city" />
                        </div>
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="date_of_birth">Date d'anniversaire <b class="text-danger">*</b></label>
                        <input class="form-control" value="<?php echo $user['date_of_birth']?>" type="date" name="date_of_birth" id="date_of_birth" />
                    </div>
                    <div class="form-group col-sm-8 offset-sm-2">
                        <label for="mobile">Téléphone <b class="text-danger">*</b></label>
                        <input class="form-control" value="<?php echo $user['mobile']?>"  type="tel" name="mobile" id="mobile" />
                    </div>

                    <div class="text-right col-sm-8 offset-sm-2">
                        <p class="text-danger">* champs requis</p>
                        <input class="btn blue" type="submit" name="update" value="Valider" />
                    </div>

                </form>

        </div>

        <?php require 'partials/footer.php'; ?>
    </body>
</html>
