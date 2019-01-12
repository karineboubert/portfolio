<?php
require_once('Models/front/faq.php');

    $categories = categoriesFAQ();

    $questions = questionFAQ();

require_once('Views/front/faq.php');
?>