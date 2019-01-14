<?php
require_once('models/front/contact.php');

if(isset($_SESSION['user_id'])){
    $user = user($_SESSION['user_id']);
}

require_once('views/front/contact.php');
