<?php
require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

if(isset($_POST['save'])){
    $query = $db->prepare('INSERT INTO fly (fly_name, fly_class, fly_country, hours, fly_price) VALUES (?, ?, ?, ?, ?)');
    $newFly = $query->execute(
		[
			$_POST['fly_name'],
			$_POST['fly_class'],
			$_POST['fly_country'],
			$_POST['hours'],
      $_POST['fly_price'],

		]
    );

    if($newFly){
        if(isset($_FILES['image'])){

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if ( in_array($my_file_extension , $allowed_extensions) ){

                $new_file_name = md5(rand());
                $destination = '../asset/img/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
                $lastInsertedFlyId = $db->lastInsertId();

                $query = $db->prepare('UPDATE fly SET
									fly_img = :fly_img
									WHERE id = :id'
                );
                $resultUpdateImage = $query->execute(
                    [
                        'fly_img' => $new_file_name . '.' . $my_file_extension,
                        'id' => $lastInsertedFlyId
                    ]
                );
            }
        }



        header('location:fly-list.php');
        exit;
    }
    else {
        $message = "Impossible d'enregistrer le nouveau vol...";
    }
}

if(isset($_POST['update'])){

	$query = $db->prepare('UPDATE fly SET
		fly_name = :fly_name,
		fly_class = :fly_class,
		fly_country = :fly_country,
		hours = :hours,
		fly_price = :fly_price
		WHERE id = :id'
	);

	//données du formulaire
	$result = $query->execute(
		[
			'fly_name' => $_POST['fly_name'],
			'fly_class' => $_POST['fly_class'],
			'fly_country' => $_POST['fly_country'],
			'hours' => $_POST['hours'],
      'fly_price' => $_POST['fly_price'],
			'id' => $_POST['id']
		]
	);



	if($result){
        if(isset($_FILES['image'])){

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if ( in_array($my_file_extension , $allowed_extensions) ){


				if(isset($_POST['current-image'])){
					unlink('../assets/img/' . $_POST['current-image']);
				}

                $new_file_name = md5(rand());
                $destination = '../assets/img/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

                $query = $db->prepare('UPDATE fly SET
					fly_img = :fly_img
					WHERE id = :id'
                );
                $resultUpdateImage = $query->execute(
                    [
                        'fly_img' => $new_file_name . '.' . $my_file_extension,
                        'id' => $_POST['id']
                    ]
                );
            }
        }

        header('location:fly-list.php');
        exit;
    }
    else {
        $message = "Impossible d'enregistrer le nouveau vol...";
    }
}

if(isset($_GET['fly_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){

	$query = $db->prepare('SELECT * FROM fly WHERE id = ?');
    $query->execute(array($_GET['fly_id']));
		$fly = $query->fetch();
}

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

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-12">
					<header class="pb-3">
						<h4><?php if(isset($fly)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un vol</h4>
					</header>

					<?php if(isset($message)): ?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>



					<form action="fly-form.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="fly_name">Nom de la compagnie :</label>
							<input class="form-control" <?php if(isset($fly)): ?>value="<?php echo htmlentities($fly['fly_name']); ?>"<?php endif; ?> type="text" placeholder="Nom de la compagnie" name="fly_name" id="fly_name" />
						</div>

						<div class="form-group">
							<label for="fly_class">Classe : </label>
							<input class="form-control" <?php if(isset($fly)): ?>value="<?php echo htmlentities($fly['fly_class']); ?>"<?php endif; ?> type="text" placeholder="Classe" name="fly_class" id="fly_class" />
						</div>

						<div class="form-group">
							<label for="fly_country">Pays : </label>
							<input class="form-control" <?php if(isset($fly)): ?>value="<?php echo htmlentities($fly['fly_country']); ?>"<?php endif; ?> type="text" placeholder="Pays" name="fly_country" id="fly_country" />
						</div>

						<div class="form-group">
							<label for="fly_image">Image :</label>
							<input class="form-control" type="file" name="fly_image" id="fly_image" />
                            <?php if(isset($fly) && $fly['fly_img']): ?>
							<img class="img-fluid py-4" src="../assets/img/<?php echo $fly['fly_img']; ?>" alt="" />
							<input type="hidden" name="current-image" value="<?php echo $fly['fly_img']; ?>" />
							<?php endif; ?>
						</div>

                        <div class="form-group">
                            <label for="hours">Heure de vol</label>
                            <input class="form-control" value="<?php if(isset($fly)): ?><?php echo $fly['hours']?><?php endif; ?>"  type="time" name="hours" id="hours" />
                        </div>

                        <div class="form-group">
                            <label for="fly_price">Prix : </label>
                            <input class="form-control" <?php if(isset($fly)): ?>value="<?php echo htmlentities($fly['fly_price']); ?>"<?php endif; ?> type="text" placeholder="Prix" name="fly_price" id="fly_price" />
                        </div>




						<div class="text-right">
							<?php if(isset($fly)): ?>
							<input class="btn black" type="submit" name="update" value="Mettre à jour" />
							<?php else: ?>
							<input class="btn blue" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>

						<?php if(isset($fly)): ?>
						<input type="hidden" name="id" value="<?php echo $fly['id']?>" />
						<?php endif; ?>

					</form>
				</section>
			</div>

		</div>
		<?php require 'partials/footer.php'; ?>
	</body>
</html>
