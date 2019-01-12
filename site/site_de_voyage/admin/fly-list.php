<?php

require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

if(isset($_GET['fly_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

	$query = $db->prepare('DELETE FROM fly WHERE id = ?');
	$result = $query->execute(
		[
			$_GET['fly_id']
		]
	);
	if($result){
		$message = "Suppression efféctuée.";
	}
	else{
		$message = "Impossible de supprimer la séléction.";
	}
}

$query = $db->query('SELECT * FROM fly');
$flights = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des vols</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<?php require 'partials/header.php'; ?>
		<div class="container-fluid">
<?php require 'partials/nav.php'; ?>
			<div class="row my-3 index-content">



				<section class="col-12">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des vols</h4>
						<a class="btn blue" href="fly-form.php">Ajouter un vol</a>
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
								<th>Nom de la compagnie</th>
								<th>Classe</th>
                <th>Prix</th>
                <th>Heures de vol</th>
                <th>Pays</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php if($flights): ?>
							<?php foreach($flights as $fly): ?>

							<tr>
								<th><?php echo htmlentities($fly['id']); ?></th>
								<td><?php echo htmlentities($fly['fly_name']); ?></td>
								<td><?php echo htmlentities($fly['fly_class']); ?></td>
                <td><?php echo htmlentities($fly['fly_price']); ?></td>
                <td><?php echo htmlentities($fly['hours']); ?></td>
                <td><?php echo htmlentities($fly['fly_country']); ?></td>
								<td>
									<a href="fly-form.php?fly_id=<?php echo $fly['id']; ?>&action=edit" class="btn black">Modifier</a>
									<a onclick="return confirm('Are you sure?')" href="fly-list.php?fly_id=<?php echo $fly['id']; ?>&action=delete" class="btn blue">Supprimer</a>
								</td>
							</tr>

							<?php endforeach; ?>
							<?php else: ?>
								Aucun vol enregistré.
							<?php endif; ?>

						</tbody>
					</table>

				</section>

			</div>

		</div>
		<?php require 'partials/footer.php'; ?>
	</body>
</html>
