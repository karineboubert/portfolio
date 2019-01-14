<?php
require_once('models/admin/topic.php');

if(isset($_GET['topic_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteTopic($_GET['topic_id']);
    $message = DeleteTopic($_GET['topic_id']);
}
$topics = adminTopics();

require_once('views/admin/topic-list.php');

