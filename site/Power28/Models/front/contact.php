<?php
if(isset($_POST['submit'])){
    //encodage du header
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Power28.com"<support@power28.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];


    if(isset($name) && isset($email) && isset($msg)) {
        if(!empty($name) && !empty($email) && !empty($msg)) {
            $message='
                <p>Nom de l\'expéditeur : '. $name . '</p>
                <p>' . nl2br($msg) . '</p> <!-- retour a la ligne -->
			';

            mail("boubertkarine@gmail.com", "Ce mail provient de:" .$email,$message, $header);
            $send = 'Message bien envoyé';
        } else {
            $alert = 'Les champs sont vides';
        }
    } else {
        $alert = 'Tous les champs ne sont pas parvenus';
    }
}


function user($userId)
{
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM kp28_user WHERE id = ?');
    $query->execute(array($userId));

    return $query->fetch();
}