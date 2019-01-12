<?php
require_once('Models/front/login-register.php');

if(isset($_SESSION['user'])){
    header('location:index.php');
    exit;
}
else{

    if(isset($_POST['login'])){
        login($_POST['email'],$_POST['password']);

        $loginMessage = login($_POST['email'],$_POST['password']);
    }


    if(isset($_POST['register'])){
        register($_POST['firstname'],$_POST['lastname'],$_POST['company_name'],$_POST['pseudo'],$_POST['email'],$_POST['password'],$_POST['password_confirm'],$_POST['address'],$_POST['postcode'],$_POST['city'],$_POST['mobile']);

        $registerMessage =  register($_POST['firstname'],$_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'],$_POST['password'],$_POST['password_confirm'],$_POST['address'],$_POST['postcode'],$_POST['city'],$_POST['mobile']);

    }

}

require_once('Views/front/login-register.php');
