<?php
require_once('Models/admin/faq.php');

if(isset($_POST['save'])){
    save($_POST['category_id'], $_POST['question'],$_POST['answer'],$_POST['is_published']);
    $message = save($_POST['category_id'], $_POST['question'],$_POST['answer'],$_POST['is_published']);
}

if(isset($_POST['update'])){
    update($_POST['category_id'], $_POST['question'],$_POST['answer'],$_POST['is_published'],$_POST['id']);
    $message = update($_POST['category_id'], $_POST['question'],$_POST['answer'],$_POST['is_published'],$_POST['id']);
}

if(isset($_GET['faq_id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $faq = faqs();
}

require_once('Views/admin/faq-form.php');