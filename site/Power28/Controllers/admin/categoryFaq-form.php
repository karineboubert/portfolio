<?php
require_once('Models/admin/categoryFaq.php');

if(isset($_POST['save'])){
    save($_POST['name_category']);
    $message = save($_POST['name_category']);
}

if(isset($_POST['update'])){
    update($_POST['name_category'], $_POST['id']);
    $message = update($_POST['name_category'], $_POST['id']);
}

if(isset($_GET['categoryFaq_id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $categoryFaq = categoriesFAQ();
}

require_once('Views/admin/categoryFaq-form.php');
