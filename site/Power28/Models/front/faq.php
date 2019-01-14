<?php


function categoriesFAQ(){
    $db = dbConnect();

    $query = $db->prepare('
		SELECT *
		FROM kp28_category_faq
	');

    $query->execute();

    return $query->fetchAll();
}

function questionFaq(){

    $db = dbConnect();

    $query = $db->prepare('
		SELECT *
		FROM kp28_faq
		WHERE is_published = 1
	');

    $query->execute();

    return $query->fetchAll();

}
