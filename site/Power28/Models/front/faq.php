<?php


function categoriesFAQ(){
    $db = dbConnect();

    $query = $db->prepare('
		SELECT *
		FROM category_faq
	');

    $query->execute();

    return $query->fetchAll();
}

function questionFaq(){

    $db = dbConnect();

    $query = $db->prepare('
		SELECT *
		FROM faq
		WHERE is_published = 1
	');

    $query->execute();

    return $query->fetchAll();

}
