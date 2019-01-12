<?php
require_once('Models/front/user-profile.php');
    if(!isset($_SESSION['user'])){
        header('location:index.php');
        exit;
    }
    else {
        $user = sessionUser($_SESSION['user_id']);
        if (isset($_POST['update'])) {
            update($_POST['firstname'], $_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password_confirm'], $_POST['address'],$_POST['postcode'],$_POST['city'], $_POST['mobile'], $user['email'], $user['pseudo'], $_SESSION['user_id']);
            $updateMessage = update($_POST['firstname'], $_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password_confirm'], $_POST['address'], $_POST['postcode'],$_POST['city'], $_POST['mobile'],  $user['email'], $user['pseudo'], $_SESSION['user_id']);
        }
    }
require_once('Views/front/user-profile.php');
