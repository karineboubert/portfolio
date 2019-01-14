<?php
function getCategoryForum($categoryId){

    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM kp28_category_forum WHERE id = ?');

    $query->execute(array($categoryId));

    return $query -> fetch();

}

function getCategoriesForum(){

    $db = dbConnect();

    $query = $db->query('SELECT * FROM kp28_category_forum');

    return $query->fetchAll();


}