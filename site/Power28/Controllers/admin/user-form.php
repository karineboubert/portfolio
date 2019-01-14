<?php
require_once('models/admin/user.php');

    if(isset($_POST['save'])){
        save($_POST['firstname'], $_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'], $_POST['password'],  $_POST['address'], $_POST['postcode'], $_POST['city'], $_POST['mobile'], $_POST['is_admin']);
        $message = save($_POST['firstname'], $_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'], $_POST['password'],  $_POST['address'], $_POST['postcode'], $_POST['city'], $_POST['mobile'], $_POST['is_admin']);
    }

    if(isset($_POST['update'])){
        update($_POST['firstname'], $_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'], $_POST['password'],  $_POST['address'], $_POST['postcode'], $_POST['city'], $_POST['mobile'], $_POST['is_admin'], $_POST['id']);
        $message = update($_POST['firstname'], $_POST['lastname'],$_POST['company_name'], $_POST['pseudo'], $_POST['email'], $_POST['password'],  $_POST['address'], $_POST['postcode'], $_POST['city'], $_POST['mobile'], $_POST['is_admin'], $_POST['id']);
    }

    if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
        $user = users();
    }



require_once('views/admin/user-form.php');