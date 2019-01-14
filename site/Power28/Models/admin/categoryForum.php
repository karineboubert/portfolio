<?php

function adminForum()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM kp28_category_forum');
    return($query->fetchall());
}

function DeleteCategoryForum($forum_id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM kp28_category_forum WHERE id = ?');
    $result = $query->execute(
        [
            $forum_id
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

function save($name_category){
    $db = dbConnect();

    $query = $db->prepare('INSERT INTO kp28_category_forum (name_category) VALUES (?)');
    $newForumCategory = $query->execute(
        [
            $name_category,
        ]
    );

    if($newForumCategory){
        if(isset($_FILES['image'])){
            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
            if ( in_array($my_file_extension , $allowed_extensions) ){
                $new_file_name = md5(rand());
                $destination = 'assets/img/forum/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
                $lastInsertedTopicId = $db->lastInsertId();
                $query = $db->prepare('UPDATE kp28_category_forum SET
					image = :image
					WHERE id = :id'
                );

                $resultUpdateImage = $query->execute(
                    [
                        'image' => $new_file_name . '.' . $my_file_extension,
                        'id' => $lastInsertedTopicId
                    ]
                );
            }
        }
        header('location:index.php?admin=categoryForum');
        exit;
    }
    else{
        $message = "Impossible d'enregistrer la nouvelle categorie du forum...";
    }
    return $message;
}


function update($name_category, $id){
    $db = dbConnect();

    $query = $db->prepare('UPDATE kp28_category_forum SET
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
        if(isset($_FILES['image'])){

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if ( in_array($my_file_extension , $allowed_extensions) ){

                if(isset($_POST['image'])){
                    unlink('assets/img/forum/' . $_POST['image']);
                }
                $new_file_name = md5(rand());
                $destination = 'assets/img/forum/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

                $query = $db->prepare('UPDATE kp28_category_forum SET
					image = :image
					WHERE id = :id'
                );
                $resultUpdateImage = $query->execute(
                    [
                        'image' => $new_file_name . '.' . $my_file_extension,
                        'id' => $id
                    ]
                );
            }
        }
        header('location:index.php?admin=categoryForum');
        exit;
    }
    else{
        $message = "Impossible d'enregistrer la nouvelle catégorie du forum...";
    }
    return $message;
}

function categoriesForum(){
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM kp28_category_forum WHERE id = ?');
    $query->execute(array($_GET['categoryForum_id']));

    return $query->fetch();
}