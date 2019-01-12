<?php

function adminFaqs()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM faq');
    return($query->fetchall());
}

function DeleteFaq($faq_id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM faq WHERE id = ?');
    $result = $query->execute(
        [
            $faq_id
        ]
    );

    if($result){
        $message = "Suppression effectuée.";
    }
    else{
        $message = "Impossible de supprimer la séléction.";
    }
    return $message;
}

function save($category_id, $question, $answer, $is_published){
    $db = dbConnect();

    $query = $db->prepare('INSERT INTO faq (category_id, question, answer is_published) VALUES (?, ?, ?, ?)');
    $newFaq = $query->execute(
        [
            $category_id,
            $question,
            $answer,
            $is_published,
        ]
    );

    if($newFaq){
        header('location:index.php?admin=faq');
        exit;
    }
    else{
        $message = "Impossible d'enregistrer la FAQ...";
    }
    return $message;
}

function update($category_id, $question, $answer,$is_published, $id){
    $db = dbConnect();

    $query = $db->prepare('UPDATE faq SET
        category_id = :category_id,
  		question = :question,
  		answer = :answer,
  		is_published = :is_published
  		WHERE id = :id'
    );

    //données du formulaire
    $result = $query->execute(
        [
            'category_id' => $category_id,
            'question' => $question,
            'answer' => $answer,
            'is_published' => $is_published,
            'id' => $id,
        ]
    );

    if($result){
        header('location:index.php?admin=faq');
        exit;
    }
    else{
        $message = "Impossible d'enregistrer la FAQ...";
    }
    return $message;
}

function faqs(){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM faq WHERE id = ?');
    $query->execute(array($_GET['faq_id']));

    return $query->fetch();
}
