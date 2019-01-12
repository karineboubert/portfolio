 <?php
 function purchase($user_id)
 {
     $db = dbConnect();
     $query = $db->prepare('SELECT * FROM purchase WHERE id = ?');
     $query->execute(array( $user_id));

     return $query->fetch();
 }