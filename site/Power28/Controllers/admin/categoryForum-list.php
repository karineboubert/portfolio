<?php
require_once('models/admin/categoryForum.php');

if(isset($_GET['categoryForum_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteCategoryForum($_GET['categoryForum_id']);
    $message = DeleteCategoryForum($_GET['categoryForum_id']);
}
$categoriesForum = adminForum();
require_once('views/admin/categoryForum-list.php');

