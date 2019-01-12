<?php
require_once('Models/front/price.php');

if (isset($_POST['submit'])){
    submit($_POST['price_power28'], $_POST['price_training'],$_POST['price_filesMaker'], $_SESSION['user_id']);
    $message =  submit($_POST['price_power28'], $_POST['price_training'],$_POST['price_filesMaker'], $_SESSION['user_id']);
}

require_once('Views/front/price.php');