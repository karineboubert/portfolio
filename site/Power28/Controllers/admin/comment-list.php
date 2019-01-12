<?php
require_once('Models/admin/comment.php');

if(isset($_GET['comment_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteComment($_GET['comment_id']);
    $message = DeleteComment($_GET['comment_id']);
}
$comments = adminComment();
require_once('Views/admin/comment-list.php');