<?php
if(isset($_GET['page'])) {

    if ($_GET['page'] =='functionalities') {
    require_once('views/front/functionalities.php');

    } elseif ($_GET['page'] == 'contact') {
    require_once('front/contact.php');

    }elseif ($_GET['page'] == 'price') {
    require_once('front/price.php');

    } elseif ($_GET['page'] == 'card') {
        require_once('front/card.php');

    }   elseif ($_GET['page'] == 'legalNotice') {
    require_once('front/legalNotice.php');

    }elseif ($_GET['page'] == 'login-register') {
    require_once('front/login-register.php');

    }elseif ($_GET['page'] == 'user-profile') {
        require_once('front/user-profile.php');
    }
    elseif ($_GET['page'] == 'FAQ') {
    require_once('front/faq.php');

    }elseif ($_GET['page'] == 'forum') {
        require_once('front/forum.php');

    }elseif ($_GET['page'] == 'topic_list') {
        require_once('front/topic_list.php');

    }elseif ($_GET['page'] == 'topic') {
        require_once('front/topic.php');

    } elseif ($_GET['page'] == '404') {
        require_once('views/front/error404.php');
    } else {
    require_once('front/index.php');
    }
}else{
    require_once('front/index.php');
}
