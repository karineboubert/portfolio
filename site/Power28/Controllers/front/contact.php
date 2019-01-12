<?php
require_once('Models/front/contact.php');

if(isset($_SESSION['user_id'])){
    $user = user($_SESSION['user_id']);
}

require_once('Views/front/contact.php');
