<?php

function submit($power28, $filesmarker, $training)
{
    $db = dbConnect();
    if (isset($power28) || isset($filesMarker) || isset($training)) {
        $query = $db->prepare('INSERT INTO kp28_purchase (price_power28, price_filesmarker, price_training) VALUES (?, ?, ?)');
        $newPurchase = $query->execute(
            [
                $power28,
                $filesmarker,
                $training,
            ]
        );
    }else{
        $message = "Veuillez sélectionner une valeur!";
    }
    return $message;
}
