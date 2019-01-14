<?php
require_once('models/admin/comment.php');

if(isset($_GET['comment_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteComment($_GET['comment_id']);
    $message = DeleteComment($_GET['comment_id']);
}
$comments = adminComment();
require_once('views/admin/comment-list.php');