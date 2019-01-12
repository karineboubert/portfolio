<?php


    function DeleteUser($user_id){
        $db = dbConnect();
        $query = $db->prepare('DELETE FROM user WHERE id = ?');
        $result = $query->execute(
            [
                $user_id
            ]
        );

        if($result){
            $message = "Suppression effectuée.";
        }
        else{
            $message = "Impossible de supprimer la séléction.";
        }
        return $message;
    }
    $query = $db->query('SELECT * FROM user');
    $users = $query->fetchAll();




    function save($firstname, $lastname,$company_name, $pseudo, $email, $password, $address, $postcode, $city, $mobile, $is_admin){
        $db = dbConnect();

        $query = $db->prepare('INSERT INTO user (firstname, lastname, company_name, pseudo, email, password, address, postcode, city, mobile, is_admin) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
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
                $mobile,
                $is_admin
            ]
        );
        if($newUser){
            header('location:index.php?admin=user');
            exit;
        }
        else{ //si pas $newUser => enregistrement échoué => générer un message pour l'administrateur à afficher plus bas
            $message = "Impossible d'enregistrer le nouvel utilisateur...";
        }
        return $message;
    }




    function update($firstname, $lastname,$company_name, $pseudo, $email, $password, $address, $postcode, $city, $mobile, $is_admin, $id){
        $db = dbConnect();

        $queryString = 'UPDATE user SET firstname = :firstname, lastname = :lastname, company_name = :company_name, pseudo = :pseudo, email = :email, address = :address, postcode = :postcode, city = :city, mobile = :mobile, is_admin = :is_admin WHERE id = :id ';

        $queryParameters = [ 'firstname' => $firstname, 'lastname' => $lastname, 'company_name' => $company_name, 'pseudo' => $pseudo, 'email' => $email, 'address' => $address, 'postcode' => $postcode, 'city' => $city, 'mobile' => $mobile, 'is_admin' => $is_admin, 'id' => $id];

        //uniquement si l'admin souhaite modifier le mot de passe
    if( !empty($password)) {
        //concaténation du champ password à mettre à jour
        $queryString .= 'password = :password ';
        //ajout du paramètre password à mettre à jour
        $queryParameters['password'] = hash('md5', $password);
    }

    //préparation et execution de la requête avec la chaîne de caractères et le tableau de données
    $query = $db->prepare($queryString);
    $result = $query->execute($queryParameters);

    if($result){
        header('location:index.php?admin=user');
        exit;
    }
    else{
        $message = 'Erreur.';
    }
    return $message;
}

function users(){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM user WHERE id = ?');
    $query->execute(array($_GET['user_id']));
    return $query->fetch();
}
