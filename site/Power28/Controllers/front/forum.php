<?php

require_once('Models/front/topic.php');
require_once('Models/front/category_forum.php');

if(isset($_SESSION['user'])){
    if(isset($_SESSION['user_id'])){
        $user = sessionUser($_SESSION['user_id']);
    }

    if(isset($_POST['sendTopic'])){
        addTopic($_POST['question'],$_POST['content'], $_POST['author']);
        $addTopicMessage = addTopic($_POST['question'],$_POST['content'], $_POST['author']);
    }

}

$categoriesForum = getCategoriesForum();
$topics = getTopics(5);

require_once('Views/front/forum.php');
