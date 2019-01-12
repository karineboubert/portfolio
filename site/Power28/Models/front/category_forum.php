<?php
function getCategoryForum($categoryId){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM category_forum WHERE id = ?');

    $query->execute(array($categoryId));

    return $query -> fetch();

}

function getCategoriesForum(){

    $db = dbConnect();

    $query = $db->query('SELECT * FROM category_forum');

    return $query->fetchAll();


}