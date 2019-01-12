<?php

require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

if(isset($_GET['idTrip_Id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

	$query = $db->prepare('DELETE FROM trip WHERE idTrip = ?');
	$result = $query->execute(
		[
			$_GET['idTrip_Id']
		]
	);
	if($result){
		$message = "Suppression effectuée.";
	}
	else{
		$message = "Impossible de supprimer la sélection.";
	}
}

$query = $db->query('SELECT * FROM trip');
$trips = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des descriptions des hôtels</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<?php require 'partials/header.php'; ?>
		<div class="container-fluid">



			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-12">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des descriptions des hôtels</h4>
						<a class="btn blue" href="hotelDescription-form.php">Ajouter une description d'hôtel</a>
					</header>

					<?php if(isset($message)):  ?>
					<div class="bg-success text-white p-2 mb-4">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>

					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
                <th>Image Restaurant</th>
                <th>Image Réception</th>
                <th>Image Chambre</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php if($trips): ?>
							<?php foreach($trips as $trip): ?>

							<tr>
								<th><?php echo htmlentities($trip['idTrip']); ?></th>
								<td><?php echo htmlentities($trip['img']); ?></td>
                <td><?php echo htmlentities($trip['resto_img']); ?></td>
                <td><?php echo htmlentities($trip['home_img']); ?></td>
                <td><?php echo htmlentities($trip['room_img']); ?></td>
                <td>
									<a href="hotelDescription-form.php?idTrip_Id=<?php echo $trip['idTrip']; ?>&action=edit" class="btn black ">Modifier</a>
									<a onclick="return confirm('Etes-vous sure?')" href="hotelDescription-list.php?idTrip_id=<?php echo $trip['idTrip']; ?>&action=delete" class="btn blue">Supprimer</a>
								</td>
							</tr>

							<?php endforeach; ?>
							<?php else: ?>
								Aucune description d'hôtel enregistré.
							<?php endif; ?>

						</tbody>
					</table>

				</section>

			</div>

		</div>
        <?php require 'partials/footer.php'; ?>
    </body>
</html>
