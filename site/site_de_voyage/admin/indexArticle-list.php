<?php

require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

if(isset($_GET['hotel_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

	$query = $db->prepare('DELETE FROM indexArticle WHERE id = ?');
	$result = $query->execute(
		[
			$_GET['hotel_id']
		]
	);
	if($result){
		$message = "Suppression efféctuée.";
	}
	else{
		$message = "Impossible de supprimer la séléction.";
	}
}

$query = $db->query('SELECT * FROM indexArticle');
$hotels = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des hôtels</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<?php require 'partials/header.php'; ?>
		<div class="container-fluid">

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-12">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des hôtels</h4>
						<a class="btn blue" href="indexArticle-form.php">Ajouter un hotel</a>
					</header>

					<?php if(isset($message)): ?>
					<div class="bg-success text-white p-2 mb-4">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>

					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Pays</th>
                <th>Hôtel</th>
                <th>Prix</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php if($hotels): ?>
							<?php foreach($hotels as $hotel): ?>

							<tr>
								<th><?php echo htmlentities($hotel['id']); ?></th>
								<td><?php echo htmlentities($hotel['country']); ?></td>
                <td><?php echo htmlentities($hotel['hotel']); ?></td>
                <td><?php echo htmlentities($hotel['price']); ?></td>
								<td>
									<a href="indexArticle-form.php?hotel_id=<?php echo $hotel['id']; ?>&action=edit" class="btn black">Modifier</a>
									<a onclick="return confirm('Etes-vous sure?')" href="indexArticle-list.php?hotel_id=<?php echo $hotel['id']; ?>&action=delete" class="btn blue">Supprimer</a>
								</td>
							</tr>

							<?php endforeach; ?>
							<?php else: ?>
								Aucun hôtel enregistré.
							<?php endif; ?>

						</tbody>
					</table>

				</section>

			</div>

		</div>
	</body>
</html>
