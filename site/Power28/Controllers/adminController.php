<?php
if(isset($_GET['admin'])) {

    if(!isset($_SESSION['is_admin']) OR $_SESSION['is_admin'] ==0){
        header('location:index.php');

    }else{

        if ($_GET['admin'] =='categoryForum') {
            require_once('admin/categoryForum-list.php');

        } elseif ($_GET['admin'] == 'categoryForumForm') {
            require_once('admin/categoryForum-form.php');

        } elseif ($_GET['admin'] == 'faq') {
            require_once('admin/faq-list.php');

        } elseif ($_GET['admin'] == 'faqForm') {
            require_once('admin/faq-form.php');

        } elseif ($_GET['admin'] == 'categoryFaq') {
            require_once('admin/categoryFaq-list.php');

        } elseif ($_GET['admin'] == 'categoryFaqForm') {
            require_once('admin/categoryFaq-form.php');

        } elseif ($_GET['admin'] == 'forum') {
            require_once('admin/forum-list.php');

        } elseif ($_GET['admin'] == 'forumForm') {
            require_once('admin/forum-form.php');

        } elseif ($_GET['admin'] == 'categoryForum') {
            require_once('admin/categoryForum-list.php');

        } elseif ($_GET['admin'] == 'categoryForumForm') {
            require_once('admin/categoryForum-form.php');

        } elseif ($_GET['admin'] == 'topic') {
            require_once('admin/topic-list.php');

        } elseif ($_GET['admin'] == 'topicForm') {
            require_once('admin/topic-form.php');

        } elseif ($_GET['admin'] == 'comment') {
            require_once('admin/comment-list.php');

        } elseif ($_GET['admin'] == 'commentForm') {
            require_once('admin/comment-form.php');

        } elseif ($_GET['admin'] == 'user') {
            require_once('admin/user-list.php');

        } elseif ($_GET['admin'] == 'userForm') {
            require_once('admin/user-form.php');

        } else {
            require_once('admin/index.php');
        }
    }
}else{
    require_once('front/index.php');
}