<?php
require_once('models/admin/comment.php');

if(isset($_POST['save'])){
    save($_POST['topic_id'], $_POST['user_id'],$_POST['comment'], $_POST['author'], $_POST['is_published']);
    $message = save($_POST['topic_id'], $_POST['user_id'],$_POST['comment'], $_POST['author'], $_POST['is_published']);
}


if(isset($_POST['update'])){
    update($_POST['topic_id'], $_POST['user_id'],$_POST['comment'], $_POST['author'], $_POST['is_published'], $_POST['id']);
    $message = update($_POST['topic_id'], $_POST['user_id'],$_POST['comment'], $_POST['author'], $_POST['is_published'], $_POST['id']);
}

if(isset($_GET['comment_id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $comment = comments();
}

require_once('views/admin/comment-form.php');