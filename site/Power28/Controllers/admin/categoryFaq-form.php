<?php
require_once('models/admin/categoryFaq.php');

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

require_once('views/admin/categoryFaq-form.php');
