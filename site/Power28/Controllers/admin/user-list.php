<?php
require_once('models/admin/user.php');

if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
    DeleteUser($_GET['user_id']);
    $message = DeleteUser($_GET['user_id']);
}

require_once('views/admin/user-list.php');