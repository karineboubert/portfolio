<?php

$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();
$nbFaq = $db->query("SELECT COUNT(*) FROM faq")->fetchColumn();
$nbCategoryFaq = $db->query("SELECT COUNT(*) FROM category_faq")->fetchColumn();
$nbCategoryForum = $db->query("SELECT COUNT(*) FROM category_forum")->fetchColumn();
$nbTopic = $db->query("SELECT COUNT(*) FROM topic")->fetchColumn();
$nbComment = $db->query("SELECT COUNT(*) FROM comment")->fetchColumn();



?>


<nav class="col-12 pl-md-2 categories-nav">
	<ul class="row categories-nav">
		<li class="border col-sm-12 col-md-auto"><a href="index.php?admin=user">Gestion des utilisateurs (<?php echo $nbUsers; ?>)</a></li>
        <li class="border col-sm-12 col-md-auto"><a href="index.php?admin=categoryFaq">Gestion des catégories FAQ (<?php echo $nbCategoryFaq; ?>)</a></li>
        <li class="border col-sm-12 col-md-auto"><a href="index.php?admin=faq">Gestion de la FAQ (<?php echo $nbFaq; ?>)</a></li>
        <li class="border col-sm-12 col-md-auto"><a href="index.php?admin=categoryForum">Gestion des catégories du Forum (<?php echo $nbCategoryForum; ?>)</a></li>
        <li class="border col-sm-12 col-md-auto"><a href="index.php?admin=topic">Gestion des topics du Forum (<?php echo $nbTopic; ?>)</a></li>
        <li class="border col-sm-12 col-md-auto"><a href="index.php?admin=comment">Gestion des commentaires du Forum (<?php echo $nbComment; ?>)</a></li>
    </ul>
</nav>
