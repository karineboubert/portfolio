<?php
function adminCategoryFaq()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM category_faq');
    return($query->fetchall());
}



  function DeleteCategoriesFaq($categoryFaq_id){
      $db = dbConnect();
      $query = $db->prepare('DELETE FROM category_faq WHERE id = ?');
      $result = $query->execute(
          [
              $categoryFaq_id
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



  function save($name_category){
      $db = dbConnect();

      $query = $db->prepare('INSERT INTO category_faq (name_category) VALUES (?)');
      $newCategoryFaq = $query->execute(
          [
              $name_category,
          ]
      );

      if($newCategoryFaq){
          header('location:index.php?admin=categoryFaq');
          exit;
      }
      else{
          $message = "Impossible d'enregistrer la nouvelle catégorie de la FAQ...";
      }
      return $message;
  }


  function update($name_category, $id){
      $db = dbConnect();

      $query = $db->prepare('UPDATE category_faq SET
  		name_category = :name_category
  		WHERE id = :id'
      );

      //données du formulaire
      $result = $query->execute(
          [
              'name_category' => $name_category,
              'id' => $id,
          ]
      );

      if($result){
          header('location:index.php?admin=categoryFaq');
          exit;
      }
      else{
          $message = "Impossible d'enregistrer la nouvelle catégorie...";
      }
      return $message;
  }

  //si on modifie une catégorie, on doit séléctionner la catégorie en question (id envoyé dans URL) pour pré-remplir le formulaire plus bas

    function categoriesFAQ(){
        $db = dbConnect();

        $query = $db->prepare('SELECT * FROM category_faq WHERE id = ?');
        $query->execute(array($_GET['categoryFaq_id']));

        return $query->fetch();
    }
