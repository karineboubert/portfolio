<?php
function getTopic( $topicId ){

    $db = dbConnect();

    $query = $db->prepare('
		SELECT kp28_topic.*, GROUP_CONCAT(category_forum.name_category) AS categories
		FROM kp28_topic
		JOIN kp28_topic_category ON kp28_topic.id = kp28_topic_category.topic_id
		JOIN kp28_category_forum ON kp28_topic_category.category_id = kp28_category_forum.id
		WHERE kp28_topic.id = ? AND kp28_topic.is_published = 1
	');

    $query->execute( array( $topicId ) );

    return $query->fetch();

}

function getTopics($limit = false, $categoryId = false){

    $db = dbConnect();

    $queryString = 'SELECT kp28_topic.*, kp28_category_forum.image,name_category
                    FROM kp28_topic 
                    JOIN kp28_topic_category ON kp28_topic.id = kp28_topic_category.topic_id 
                    JOIN kp28_category_forum ON kp28_topic_category.category_id = kp28_category_forum.id 
                    WHERE kp28_topic.is_published = 1';

    if($categoryId){
        $queryString .= ' AND kp28_topic_category.category_id = :category_id';
    }

    if($limit){
        $queryString .= ' LIMIT 0, :limit';
    }

    $query = $db->prepare($queryString);

    if($limit) {
        $query->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    }
    if($categoryId){
        $query->bindValue(':category_id', (int)$categoryId, PDO::PARAM_INT);
    }


    $query -> execute();

    return $query->fetchAll();
}


function sessionUser($userId)
{
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM kp28_user WHERE id = ?');
    $query->execute(array($userId));

    return $query->fetch();
}

function addTopic($question, $content, $author){
    if(isset($question) && isset($content) && isset($author) && !empty($question) && !empty($content) && !empty($author)){

        $db = dbConnect();
        $query = $db->prepare('INSERT INTO kp28_topic (question, content, author, is_published, created_at) VALUES (?, ?, ?, 1, NOW())');
        $newTopic = $query->execute(
            [
                $question,
                $content,
                $author,
            ]
        );
        $lastInsertedTopicId = $db->lastInsertId();

        foreach($_POST['categories'] as $category_id) {

            $query = $db->prepare('INSERT INTO kp28_topic_category (topic_id, category_id) VALUES (?, ?)');
            $newTopic = $query->execute([
                $lastInsertedTopicId,
                $category_id,
            ]);
        };

        if($newTopic){
            header("location: index.php?page=topic_list#newTopic");
            exit;
        }
    } else{

        $addTopicMessage = "Tous les champs doivent être complétés";
        return $addTopicMessage;
    }
}



function addComment($comment, $pseudo, $topic_id, $user_id){
    if(isset($comment) && isset($pseudo) && !empty($comment) && !empty($pseudo)){

        $db = dbConnect();
        $query = $db->prepare('INSERT INTO kp28_comment (comment, author, topic_id, user_id, is_published, created_at) VALUES (?, ?, ?, ?, 1, NOW())');
        $newComment = $query->execute(
            [
                $comment,
                $pseudo,
                $topic_id,
                $user_id,
            ]
        );
        if($newComment){

            header("location: index.php?page=topic&topic_id=$topic_id#com");
            exit;
        }
    }
    else{

        $commentMessage = "Tous les champs doivent être complétés";
        return $commentMessage;
    }
}

function getComments($topic_id){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM kp28_comment WHERE kp28_topic_id = ? AND kp28_comment.is_published = 1 ');
    $query->execute(array($topic_id));
    return $query->fetchAll();
}






