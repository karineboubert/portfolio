<?php
require_once('models/admin/topic.php');

if(isset($_POST['save'])){
    save($_POST['question'],$_POST['content'],$_POST['author'],$_POST['is_published']);
    $message = save($_POST['question'],$_POST['content'],$_POST['author'],$_POST['is_published']);
    $categories = $categories();
}

if(isset($_POST['update'])){
    update($_POST['question'],$_POST['content'],$_POST['author'],$_POST['is_published'],$_POST['id']);
    $message = update($_POST['question'],$_POST['content'],$_POST['author'],$_POST['is_published'],$_POST['id']);
    $categories = $categories();
}

if(isset($_GET['topic_id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $topic = topics();
    $topicCategories = topicCategories();
}


require_once('views/admin/topic-form.php');
