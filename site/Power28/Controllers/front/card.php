<?php
require_once('models/front/card.php');
if(!isset($_SESSION['user'])){
    header('location:index.php?page=login-register');
    exit;
}
else {
    $purchase = purchase($_SESSION['user_id']);

}

require_once('views/front/card.php');
