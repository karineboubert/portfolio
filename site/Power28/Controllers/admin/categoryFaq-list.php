<?php
require_once('models/admin/categoryFaq.php');

if(isset($_GET['categoryFaq_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteCategoryFaq($_GET['categoryFaq_id']);
    $message = DeleteCategoryFaq($_GET['categoryFaq_id']);
}
$categoriesFaq = adminCategoryFaq();
require_once('views/admin/categoryFaq-list.php');
