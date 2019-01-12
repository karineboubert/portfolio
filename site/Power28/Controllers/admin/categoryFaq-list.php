<?php
require_once('Models/admin/categoryFaq.php');

if(isset($_GET['categoryFaq_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteCategoryFaq($_GET['categoryFaq_id']);
    $message = DeleteCategoryFaq($_GET['categoryFaq_id']);
}
$categoriesFaq = adminCategoryFaq();
require_once('Views/admin/categoryFaq-list.php');
