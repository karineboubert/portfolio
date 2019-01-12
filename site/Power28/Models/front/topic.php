<?php
function getTopic( $topicId ){

    $db = dbConnect();

    $query = $db->prepare('
		SELECT topic.*, GROUP_CONCAT(category_forum.name_category) AS categories
		FROM topic
		JOIN topic_category ON topic.id = topic_category.topic_id
		JOIN category_forum ON topic_category.category_id = category_forum.id
		WHERE topic.id = ? AND topic.is_published = 1
	');

    $query->execute( array( $topicId ) );

    return $query->fetch();

}

function getTopics($limit = false, $categoryId = false){

    $db = dbConnect();

    $queryString = 'SELECT topic.*, category_forum.image,name_category
                    FROM topic 
                    JOIN topic_category ON topic.id = topic_category.topic_id 
                    JOIN category_forum ON topic_category.category_id = category_forum.id 
                    WHERE topic.is_published = 1';

    if($categoryId){
        $queryString .= ' AND topic_category.category_id = :category_id';
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
    $query = $db->prepare('SELECT * FROM user WHERE id = ?');
    $query->execute(array($userId));

    return $query->fetch();
}

function addTopic($question, $content, $author){
    if(isset($question) && isset($content) && isset($author) && !empty($question) && !empty($content) && !empty($author)){

        $db = dbConnect();
        $query = $db->prepare('INSERT INTO topic (question, content, author, is_published, created_at) VALUES (?, ?, ?, 1, NOW())');
        $newTopic = $query->execute(
            [
                $question,
                $content,
                $author,
            ]
        );
        $lastInsertedTopicId = $db->lastInsertId();

        foreach($_POST['categories'] as $category_id) {

            $query = $db->prepare('INSERT INTO topic_category (topic_id, category_id) VALUES (?, ?)');
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
        $query = $db->prepare('INSERT INTO comment (comment, author, topic_id, user_id, is_published, created_at) VALUES (?, ?, ?, ?, 1, NOW())');
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
    $query = $db->prepare('SELECT * FROM comment WHERE topic_id = ? AND comment.is_published = 1 ');
    $query->execute(array($topic_id));
    return $query->fetchAll();
}



