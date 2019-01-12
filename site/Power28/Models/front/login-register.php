<?php
function login($email, $password){

    //si email ou password non renseigné
    if(empty($email) OR empty($password)){
        $loginMessage = "Merci de remplir tous les champs";

    }
    else{
        $db = dbConnect();
        //on cherche un utilisateur correspondant au couple email / password renseigné
        $query = $db->prepare('SELECT *
							FROM user
							WHERE email = ? AND password = ?');
        $query->execute( array( $email, hash('md5', $password) ) );
        $user = $query->fetch();
        //si un utilisateur correspond
        if($user){
            $_SESSION['is_admin'] = $user['is_admin'];
            $_SESSION['user'] = $user['firstname'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['user_id'] = $user['id'];

            header('location:index.php');
            exit;
        }
        else{ //si pas d'utilisateur correspondant on génère un message pour l'afficher plus bas
            $loginMessage = "Mauvais identifiants";
        }
    }
    return $loginMessage;

}

//En cas d'enregistrement
function register($firstname, $lastname, $company_name, $pseudo, $email, $password, $password_confirm, $address, $postcode, $city, $mobile){
    $db = dbConnect();
    //un enregistrement utilisateur ne pourra se faire que sous certaines conditions

    //en premier lieu, vérifier que l'adresse email renseignée n'est pas déjà utilisée
    $query = $db->prepare('SELECT email FROM user WHERE email = ?');
    $query->execute(array($email));
    $userAlreadyExists = $query->fetch();

    $query = $db->prepare('SELECT pseudo FROM user WHERE pseudo = ?');
    $query->execute(array($pseudo));
    $pseudoAlreadyExists = $query->fetch();


    if($userAlreadyExists){
        $registerMessage = "Adresse email déjà enregistrée";
    }
    elseif ($pseudoAlreadyExists){
        $registerMessage = "Pseudo déjà enregistrée";
    }
    elseif(empty($firstname) OR empty($lastname) OR empty($pseudo) OR empty($email) OR empty($password) OR empty($address) OR empty($postcode) OR empty($city) OR empty($mobile)){
        $registerMessage = "Merci de remplir tous les champs obligatoires (*)";
    }
    elseif($password != $password_confirm) {
        $registerMessage = "Les mots de passe ne sont pas identiques";

    }
    else {
        $query = $db->prepare('INSERT INTO user (firstname, lastname, company_name, pseudo, email, password, address, postcode, city, mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $newUser = $query->execute(
           [
                $firstname,
                $lastname,
                $company_name,
                $pseudo,
                $email,
                hash('md5', $password),
                $address,
                $postcode,
                $city,
                $mobile
            ]
        );
        $_SESSION['is_admin'] = 0;
        $_SESSION['user'] = $firstname;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['user_id'] = $db->lastInsertId();



        header('location:index.php');
        exit;

    }
    return $registerMessage ;
}
