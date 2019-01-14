<?php
require_once('models/front/faq.php');

    $categories = categoriesFAQ();

    $questions = questionFAQ();

require_once('views/front/faq.php');
?>