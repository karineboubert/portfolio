<?php
require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

if(isset($_POST['save'])){
    $query = $db->prepare('INSERT INTO indexArticle (hotel_category, country, city, hotel, content, price, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $newHotel = $query->execute(
		[
			$_POST['hotel_category'],
			$_POST['country'],
			$_POST['city'],
			$_POST['hotel'],
            $_POST['content'],
            $_POST['price'],
            $_POST['latitude'],
            $_POST['longitude'],
		]
  );

    $lastInsertedArticleId = $db->lastInsertId();

    foreach($_POST['categories'] as $category_id){
        $query = $db->prepare('INSERT INTO article_category (article_id, category_id) VALUES (?, ?)');
        $newArticle = $query->execute([
            $lastInsertedArticleId,
            $category_id,
        ]);
    }

    if($newHotel){
        if(isset($_FILES['image'])){
            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
            if ( in_array($my_file_extension , $allowed_extensions) ){
                $new_file_name = md5(rand());
                $destination = '../assets/img/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
                $lastInsertedHotelId = $db->lastInsertId();
                $query = $db->prepare('UPDATE indexArticle SET
									image = :image
									WHERE id = :id'
                );

                $resultUpdateImage = $query->execute(
                    [
                        'image' => $new_file_name . '.' . $my_file_extension,
                        'id' => $lastInsertedHotelId
                    ]
                );
            }
        }

        header('location:indexArticle-list.php');
        exit;
    }
    else {
        $message = "Impossible d'enregistrer le nouvel hôtel...";
    }
}

if(isset($_POST['update'])){

	$query = $db->prepare('UPDATE indexArticle SET
		hotel_category = :hotel_category,
		country = :country,
		city = :city,
		hotel = :hotel,
		content = :content,
		price = :price,
		latitude = :latitude,
		longitude = :longitude
		WHERE id = :id'
	);

	//données du formulaire
	$resultHotel = $query->execute(
		[
			'hotel_category' => $_POST['hotel_category'],
			'country' => $_POST['country'],
			'city' => $_POST['city'],
			'hotel' => $_POST['hotel'],
            'content' => $_POST['content'],
            'price' => $_POST['price'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
			'id' => $_POST['id'],
		]
	);

    $query = $db->prepare('DELETE FROM article_category WHERE article_id = ?');
    $result = $query->execute([
        $_POST['id']
    ]);

    foreach($_POST['categories'] as $category_id){
        $query = $db->prepare('INSERT INTO article_category (article_id, category_id) VALUES (?, ?)');
        $newArticle = $query->execute([
            $_POST['id'],
            $category_id,
        ]);
    }

    if($resultHotel){
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

                $query = $db->prepare('UPDATE indexArticle SET
									image = :image
									WHERE id = :id'
                );
                $resultUpdateImage = $query->execute(
                    [
                        'image' => $new_file_name . '.' . $my_file_extension,
                        'id' => $_POST['id']
                    ]
                );
            }
        }
        header('location:indexArticle-list.php');
        exit;
    }
    else {
        $message = "Impossible d'enregistrer le nouvel hôtel...";
    }
}

//si on modifie une catégorie, on doit séléctionner la catégorie en question (id envoyé dans URL) pour pré-remplir le formulaire plus bas
if(isset($_GET['hotel_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
    $query = $db->prepare('SELECT * FROM indexArticle WHERE id = ?');
    $query->execute(array($_GET['hotel_id']));
    //$article contiendra les informations de l'article dont l'id a été envoyé en paramètre d'URL
    $hotel = $query->fetch();

    $query = $db->prepare('SELECT category_id FROM article_category WHERE article_id = ?');
    $query->execute(array($_GET['hotel_id']));
    $articleCategories = $query->fetchAll();
}
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
					<header class="pb-3">
						<h4><?php if(isset($hotel)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un hôtel</h4>
					</header>

					<?php if(isset($message)):  ?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>


					<form action="indexArticle-form.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="country">Pays :</label>
							<input class="form-control" <?php if(isset($hotel)): ?>value="<?php echo htmlentities($hotel['country']); ?>"<?php endif; ?> type="text" placeholder="Pays" name="country" id="country" />
						</div>

						<div class="form-group">
							<label for="city">Ville : </label>
							<input class="form-control" <?php if(isset($hotel)): ?>value="<?php echo htmlentities($hotel['city']); ?>"<?php endif; ?> type="text" placeholder="Ville" name="city" id="city" />
						</div>

						<div class="form-group">
							<label for="hotel">Hôtel : </label>
							<input class="form-control" <?php if(isset($hotel)): ?>value="<?php echo htmlentities($hotel['hotel']); ?>"<?php endif; ?> type="text" placeholder="Hôtel" name="hotel" id="hotel" />
						</div>

                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input class="form-control" type="file" name="image" id="image" />
                            <?php if(isset($hotel) && $hotel['image']): ?>
                                <img class="img-fluid py-4" src="../assets/img/<?php echo $hotel['image']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $hotel['image']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="hotel_category"> Catégories ?</label>
                            <select class="form-control" name="hotel_category" id="hotel_category">
                                <option value="1" <?php if(isset($hotel) && $hotel['hotel_category'] == 1): ?>selected<?php endif; ?>> Recommandations</option>
                                <option value="2" <?php if(isset($hotel) && $hotel['hotel_category'] == 2): ?>selected<?php endif; ?>> Nouveautés </option>
                                <option value="3" <?php if(isset($hotel) && $hotel['hotel_category'] == 3): ?>selected<?php endif; ?>> Dernières Minutes </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="categories"> Catégorie dans l'hôtel </label>
                            <select class="form-control" name="categories[]" id="categories" multiple="multiple">
                                <?php
                                $queryCategory= $db ->query('SELECT * FROM category');
                                $categories = $queryCategory->fetchAll();
                                ?>
                                <?php foreach($categories as $key => $category) : ?>

                                    <?php
                                    $selected = '';

                                    foreach ($articleCategories as $articleCategorie) {
                                        if($category['id'] == $articleCategorie['category_id']){
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>> <?php echo $category['name_category']; ?> </option>
                                <?php endforeach; ?>

                            </select>
                        </div>



                        <div class="form-group">
                            <label for="content">Contenu :</label>
                            <textarea class="form-control" name="content" id="content" placeholder="Contenu"><?php if(isset($hotel)): ?><?php echo htmlentities($hotel['content']); ?><?php endif; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Prix : </label>
                            <input class="form-control" <?php if(isset($hotel)): ?>value="<?php echo htmlentities($hotel['price']); ?>"<?php endif; ?> type="text" placeholder="Prix" name="price" id="price" />
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude : </label>
                            <input class="form-control" <?php if(isset($hotel)): ?>value="<?php echo htmlentities($hotel['latitude']); ?>"<?php endif; ?> type="text" placeholder="Latitude" name="latitude" id="latitude" />
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude : </label>
                            <input class="form-control" <?php if(isset($hotel)): ?>value="<?php echo htmlentities($hotel['longitude']); ?>"<?php endif; ?> type="text" placeholder="Longitude" name="longitude" id="longitude" />
                        </div>




						<div class="text-right">
							<?php if(isset($hotel)): ?>
							<input class="btn black" type="submit" name="update" value="Mettre à jour" />
							<?php else: ?>
							<input class="btn blue" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>


						<?php if(isset($hotel)): ?>
						<input type="hidden" name="id" value="<?php echo $hotel['id']?>" />
						<?php endif; ?>

					</form>
				</section>
			</div>

		</div>
	</body>
</html>
