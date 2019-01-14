<?php
function adminComment()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM kp28_comment');
    return($query->fetchall());
}



  function DeleteComment($comment_id){
      $db = dbConnect();
      $query = $db->prepare('DELETE FROM kp28_comment WHERE id = ?');
      $result = $query->execute(
          [
              $comment_id
          ]
      );

      if($result){
          $message = "Suppression effectuée.";
      }
      else{
          $message = "Impossible de supprimer la séléction.";
      }
      return $message;
      header('location:index.php');
  }



  function save($topic_id, $user_id, $comment, $author, $is_published){
      $db = dbConnect();

      $query = $db->prepare('INSERT INTO kp28_comment (topic_id, user_id, comment, author, is_published, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
      $newComment = $query->execute(
          [
              $topic_id,
              $user_id,
              $comment,
              $author,
              $is_published,
          ]
      );

      if($newComment){
          header('location:index.php?admin=comment');
          exit;
      }
      else{
          $message = "Impossible d'enregistrer le nouveau commentaire du Forum...";
      }
      return $message;
  }


  function update($topic_id, $user_id, $comment, $author, $is_published, $id){
      $db = dbConnect();

      $query = $db->prepare('UPDATE kp28_comment SET
  		topic_id = :topic_id,
  		user_id = :user_id,
  		comment = :comment,
  		author = :author,
  		is_published = :is_published
  		WHERE id = :id'
      );

      //données du formulaire
      $result = $query->execute(
          [
              'topic_id' => $topic_id,
              'user_id' => $user_id,
              'comment' => $comment,
              'author' => $author,
              'is_published' => $is_published,
              'id' => $id,
          ]
      );
      if($result){
          header('location:index.php?admin=comment');
          exit;
      }
      else{
          $message = "Impossible d'enregistrer le nouveau commentaire...";
      }
      return $message;
  }

  //si on modifie une catégorie, on doit séléctionner la catégorie en question (id envoyé dans URL) pour pré-remplir le formulaire plus bas

    function comments(){
        $db = dbConnect();

        $query = $db->prepare('SELECT * FROM kp28_comment WHERE id = ?');
        $query->execute(array($_GET['comment_id']));

        return $query->fetch();
    }