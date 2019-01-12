<?php
	$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();
	$nbflights = $db->query("SELECT COUNT(*) FROM fly")->fetchColumn();
  $nbHotels = $db->query("SELECT COUNT(*) FROM indexArticle")->fetchColumn();
  $nbTrip = $db->query("SELECT COUNT(*) FROM trip")->fetchColumn();
	$nbCategories = $db->query("SELECT COUNT(*) FROM category")->fetchColumn();

?>
<nav class="col-12 py-2 categories-nav">
	<ul class="row">
		<li class="border"><a href="user-list.php">Gestion des utilisateurs (<?php echo $nbUsers; ?>)</a></li>
		<li class="border"><a href="fly-list.php">Gestion des vols (<?php echo $nbflights; ?>)</a></li>
        <li class="border"><a href="indexArticle-list.php">Gestion des hôtels (<?php echo $nbHotels; ?>)</a></li>
        <li class="border"><a href="hotelDescription-list.php">Gestion des descriptions des hôtels (<?php echo $nbTrip; ?>)</a></li>
				<li class="border"><a href="category-list.php">Gestion des catégories (<?php echo $nbCategories; ?>)</a></li>
	</ul>
</nav>
