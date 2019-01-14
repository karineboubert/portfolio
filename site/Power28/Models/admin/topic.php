<?php

// topic list récupérer la table topic

function adminTopics()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM kp28_topic');
    return($query->fetchall());
}

//topic list suppression en get

function DeleteTopic($topic_id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM kp28_topic WHERE id = ?');
    $result = $query->execute(
        [
            $topic_id
        ]
    );
    $query = $db->prepare('DELETE FROM kp28_topic_category WHERE topic_id = ?');
    $result = $query->execute([
        $topic_id
    ]);


    if($result){
        $message = "Suppression effectuée.";
    }
    else{
        $message = "Impossible de supprimer la séléction.";
    }
    return $message;
}

//topic form ajouter un nouveau topic

function save($question, $content, $author,$is_published){
    $db = dbConnect();

    $query = $db->prepare('INSERT INTO kp28_topic (question, content, author, is_published, created_at) VALUES (?, ?, ?, ?, NOW())');
    $newTopic = $query->execute(
        [
            $question,
            $content,
            $author,
            $is_published,
        ]
    );
    $lastInsertedTopicId = $db->lastInsertId(); //récupérer l'id

    foreach($_POST['categories'] as $category_id) {

        $query = $db->prepare('INSERT INTO kp28_topic_category (topic_id, category_id) VALUES (?, ?)');
        $newTopic = $query->execute([
            $lastInsertedTopicId,
            $category_id,
        ]);
    }

    if($newTopic){
        header('location:index.php?admin=topic');
        exit;
    }
    else{
        $message = "Impossible d'enregistrer le nouveau topic du forum...";
    }
    return $message;
}

//form update
function update($question, $content, $author,$is_published, $id){
    $db = dbConnect();

    $query = $db->prepare('UPDATE kp28_topic SET
  		question = :question,
  		content = :content,
  		author = :author,
  		is_published = :is_published
  		WHERE id = :id'
    );

    //données du formulaire
    $result = $query->execute(
        [
            'question' => $question,
            'content' => $content,
            'author' => $author,
            'is_published' => $is_published,
            'id' => $id,
        ]
    );
    $query = $db->prepare('DELETE FROM kp28_topic_category WHERE topic_id = ?');
    $result = $query->execute(
        [
            $id
        ]
    );
/// pour chaque $_POST assigné a $category_id
    foreach($_POST['categories'] as $category_id){
        $query = $db->prepare('INSERT INTO kp28_topic_category (topic_id, category_id) VALUES (?, ?)');
        $newTopic = $query->execute([
            $id,
            $category_id,
        ]);
    }

    if($result){
        header('location:index.php?admin=topic');
        exit;
    }
    else{
        $message = "Impossible d'enregistrer le nouveau topic...";
    }
    return $message;
}

// afficher  category form
function categories(){
    $db = dbConnect();
    $queryCategory = $db->query('SELECT * FROM kp28_category_forum');
    return $queryCategory->fetchAll();
}

// for update
function topics(){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM kp28_topic WHERE id = ?');
    $query->execute(array($_GET['topic_id']));

    return $query->fetch();
}

function topicCategories(){
    $db = dbConnect();
    $query = $db->prepare('SELECT category_id FROM kp28_topic_category WHERE topic_id = ?');
    $query->execute(array($_GET['topic_id']));
    return $query->fetchAll();
}