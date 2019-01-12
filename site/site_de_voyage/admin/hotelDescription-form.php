<?php
require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}
if(isset($_POST['save'])){
    $query = $db->prepare('INSERT INTO trip (essential, detail, price_have, price_dont) VALUES (?, ?, ?, ?)');
    $newTrip = $query->execute(
		[
			$_POST['essential'],
			$_POST['detail'],
			$_POST['price_have'],
			$_POST['price_dont'],
		]
    );

    if($newTrip){

        if(isset($_FILES['image'])){

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
            if ( in_array($my_file_extension , $allowed_extensions) ){
                $new_file_name = md5(rand());
                $destination = '../assets/img/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
                $lastInsertedTripId = $db->lastInsertId();
                $query = $db->prepare('UPDATE trip SET
					img = :img,
					home_img = :home_img,
					desk_img = :desk_img,
					resto_img = :resto_img,
					room_img = :room_img
					WHERE id_trip = :id_trip'
                );

                $resultUpdateImage = $query->execute(
                    [
                        'img' => $new_file_name . '.' . $my_file_extension,
                        'home_img' => $new_file_name . '.' . $my_file_extension,
                        'desk_img' => $new_file_name . '.' . $my_file_extension,
                        'resto_img'=> $new_file_name . '.' . $my_file_extension,
                        'room_img'=> $new_file_name . '.' . $my_file_extension,
                        'idTrip' => $lastInsertedTripId
                    ]
                );
            }
        }

        header('location:hotelDescription-list.php');
        exit;
    }
    else {
        $message = "Impossible d'enregistrer la nouvelle description d'hôtel...";
    }
}


if(isset($_POST['update'])){

	$query = $db->prepare('UPDATE trip SET
		essential = :essential,
		detail = :detail,
		price_have = :price_have,
		price_dont = :price_dont
		WHERE idTrip = :idTrip'
	);

	//données du formulaire
	$resultTrip = $query->execute(
		[
			'essential' => $_POST['essential'],
			'detail' => $_POST['detail'],
			'price_have' => $_POST['price_have'],
			'price_dont' => $_POST['price_dont'],
			'idTrip' => $_POST['idTrip'],
		]
	);

    if($resultTrip){
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

                $query = $db->prepare('UPDATE trip SET
					img = :img,
					home_img = :home_img,
					desk_img = :desk_img,
					resto_img = :resto_img,
					room_img = :room_img
					WHERE idTrip = :idTrip'
                );
                $resultUpdateImage = $query->execute(
                    [
                        'img' => $new_file_name . '.' . $my_file_extension,
                        'home_img' => $new_file_name . '.' . $my_file_extension,
                        'desk_img' => $new_file_name . '.' . $my_file_extension,
                        'resto_img'=> $new_file_name . '.' . $my_file_extension,
                        'room_img'=> $new_file_name . '.' . $my_file_extension,
                        'idTrip' => $_POST['idTrip']
                    ]
                );
            }
        }
        header('location:hotelDescription-list.php');
        exit;
    }
    else {
        $message = "Impossible d'enregistrer la nouvelle description d'hôtel...";
    }
}

if(isset($_GET['idTrip_Id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
    $query = $db->prepare('SELECT * FROM trip WHERE idTrip = ?');
    $query->execute(array($_GET['idTrip_Id']));
    $trip = $query->fetch();
}
?>

<!DOCTYPE html>
<html>
	<head>

		<title>Administration des descriptions d'hôtels</title>

		<?php require 'partials/head_assets.php'; ?>

	</head>
	<body class="index-body">
		<?php require 'partials/header.php'; ?>
		<div class="container-fluid">


			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-12">
					<header class="pb-3">

						<h4><?php if(isset($trip)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une description</h4>
					</header>

					<?php if(isset($message)):?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>


					<form action="hotelDescription-form.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="essential">Essentiel :</label>
                            <textarea class="form-control" name="essential" id="essential" placeholder="Essentiel"><?php if(isset($trip)): ?><?php echo htmlentities($trip['essential']); ?><?php endif; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="detail">Détail :</label>
                            <textarea class="form-control" name="detail" id="detail" placeholder="Détail"><?php if(isset($trip)): ?><?php echo htmlentities($trip['detail']); ?><?php endif; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price_have">Comprend :</label>
                            <textarea class="form-control" name="price_have" id="price_have" placeholder="Comprend"><?php if(isset($trip)): ?><?php echo htmlentities($trip['price_have']); ?><?php endif; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price_dont">Ne comprend pas :</label>
                            <textarea class="form-control" name="price_dont" id="price_dont" placeholder="Ne comprend pas"><?php if(isset($trip)): ?><?php echo htmlentities($trip['price_dont']); ?><?php endif; ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="img">Image :</label>
                            <input class="form-control" type="file" name="img" id="img" />
                            <?php if(isset($trip) && $trip['img']): ?>
                                <img class="img-fluid py-4" src="../assets/img/<?php echo $trip['img']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $trip['img']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="home_img">Image :</label>
                            <input class="form-control" type="file" name="home_img" id="home_img" />
                            <?php if(isset($trip) && $trip['home_img']): ?>
                                <img class="img-fluid py-4" src="../assets/img/<?php echo $trip['home_img']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $trip['home_img']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="desk_img">Image 2 :</label>
                            <input class="form-control" type="file" name="desk_img" id="desk_img" />
                            <?php if(isset($trip) && $trip['desk_img']): ?>
                                <img class="img-fluid py-4" src="../assets/img/<?php echo $trip['desk_img']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $trip['desk_img']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="resto_img">Image restaurant :</label>
                            <input class="form-control" type="file" name="resto_img" id="resto_img" />
                            <?php if(isset($trip) && $trip['resto_img']): ?>
                                <img class="img-fluid py-4" src="../assets/img/<?php echo $trip['resto_img']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $trip['resto_img']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="room_img">Image chambre :</label>
                            <input class="form-control" type="file" name="room_img" id="room_img" />
                            <?php if(isset($trip) && $trip['room_img']): ?>
                                <img class="img-fluid py-4" src="../assets/img/<?php echo $trip['room_img']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $trip['room_img']; ?>" />
                            <?php endif; ?>
                        </div>


						<div class="text-right">
							<?php if(isset($trip)): ?>
							<input class="btn black" type="submit" name="update" value="Mettre à jour" />
							<?php else: ?>
							<input class="btn blue" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>

						<?php if(isset($trip)): ?>
						<input type="hidden" name="idTrip" value="<?php echo $trip['idTrip']?>" />
						<?php endif; ?>

					</form>
				</section>
			</div>

		</div>
        <?php require 'partials/footer.php'; ?>
	</body>
</html>
