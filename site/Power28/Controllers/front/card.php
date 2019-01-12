<?php
require_once('Models/front/card.php');
if(!isset($_SESSION['user'])){
    header('location:index.php?page=login-register');
    exit;
}
else {
    $purchase = purchase($_SESSION['user_id']);

}

require_once('Views/front/card.php');
