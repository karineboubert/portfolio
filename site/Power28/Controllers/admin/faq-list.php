<?php
require_once('Models/admin/faq.php');

if(isset($_GET['faq_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    DeleteFaq($_GET['faq_id']);
    $message = DeleteFaq($_GET['faq_id']);
}
$faqs = adminFaqs();

require_once('Views/admin/faq-list.php');