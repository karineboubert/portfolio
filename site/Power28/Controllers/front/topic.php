<?php
require_once('models/front/topic.php');
require_once('models/front/category_forum.php');

	if(isset($_GET['topic_id'])){
        $topic = getTopic( $_GET['topic_id'] );
        if(isset($_SESSION['user_id'])){
            $user = sessionUser($_SESSION['user_id']);
        }
        if(isset($_POST['sendComment'])){
            addComment($_POST['comment'],$user['pseudo'], $_GET['topic_id'],$_SESSION['user_id']);

            $commentMessage = addComment($_POST['comment'],$user['pseudo'], $_GET['topic_id'],$_SESSION['user_id']);

        }

        $comments = getComments($_GET['topic_id']);

		if(!$topic['id']){
			header('location:index.php?page=forum');
			exit;
		}
		$categoriesForum = getCategoriesForum();


		require_once('views/front/topic.php');
	}
	else{
		header('location:index.php?page=404');
		exit;
	}


