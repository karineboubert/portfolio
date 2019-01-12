<?php

require_once ('models/front/topic.php');
require_once ('models/front/category_forum.php');

$categoriesForum = getCategoriesForum();

if(isset($_SESSION['user'])){

    if(isset($_SESSION['user_id'])){
        $user = sessionUser($_SESSION['user_id']);
    }

    if(isset($_POST['sendTopic'])){
        addTopic($_POST['question'],$_POST['content'], $_POST['author']);
        $addTopicMessage = addTopic($_POST['question'],$_POST['content'], $_POST['author']);
    }
}

if(isset($_GET['category_id'])){

    $currentCategory = getCategoryForum($_GET['category_id']);
    if($currentCategory) {
        $topics = getTopics(false, $_GET['category_id']);
    }
    else{
            header('location:index.php?page=404');
            exit;
    }
}
else{
    $topics = getTopics(false, false);
}



require_once ('views/front/topic_list.php');

