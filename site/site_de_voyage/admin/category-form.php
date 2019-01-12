<?php
require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}
//Si $_POST['save'] existe, cela signifie que c'est un ajout d'une catégorie
if(isset($_POST['save'])){
    $query = $db->prepare('INSERT INTO category (name_category) VALUES (?)');
    $newCategory = $query->execute(
		[
			$_POST['name_category']
		]
    );

		if($newCategory){
			header('location:category-list.php');
			exit;
			}
		else{
			$message = "Impossible d'enregistrer la nouvelle catégorie...";
		}
}

//Si $_POST['update'] existe, cela signifie que c'est une mise à jour de catégorie
if(isset($_POST['update'])){

	$query = $db->prepare('UPDATE category SET
		name_category = :name_category
		WHERE id = :id'
	);

	//données du formulaire
	$result = $query->execute(
		[
			'name_category' => $_POST['name_category'],
			'id' => $_POST['id']
		]
	);

	if($result){
		header('location:category-list.php');
		exit;
	}
	else{
		$message = "Impossible d'enregistrer la nouvelle catégorie...";
	}
}

//si on modifie une catégorie, on doit séléctionner la catégorie en question (id envoyé dans URL) pour pré-remplir le formulaire plus bas
if(isset($_GET['category_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){

	$query = $db->prepare('SELECT * FROM category WHERE id = ?');
  $query->execute(array($_GET['category_id']));
	$category = $query->fetch();
}

?>

<!DOCTYPE html>
<html>
	<head>

		<title>Administration des catégories</title>

		<?php require 'partials/head_assets.php'; ?>

	</head>
	<body class="index-body">
		<div class="container-fluid">

			<?php require 'partials/header.php'; ?>

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-9">
					<header class="pb-3">
						<!-- Si $category existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
						<h4><?php if(isset($category)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une catégorie</h4>
					</header>

					<?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>

					<!-- Si $category existe, chaque champ du formulaire sera pré-remplit avec les informations de la catégorie -->

					<form action="category-form.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name_category">Nom :</label>
							<input class="form-control" <?php if(isset($category)): ?>value="<?php echo htmlentities($category['name_category']); ?>"<?php endif; ?> type="text" placeholder="Nom" name="name_category" id="name_category" />
						</div>




						<div class="text-right">
							<!-- Si $category existe, on affiche un lien de mise à jour -->
							<?php if(isset($category)): ?>
							<input class="btn btn black" type="submit" name="update" value="Mettre à jour" />
							<!-- Sinon on afficher un lien d'enregistrement d'une nouvelle catégorie -->
							<?php else: ?>
							<input class="btn btn blue" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>

						<!-- Si $category existe, on ajoute un champ caché contenant l'id de la catégorie à modifier pour la requête UPDATE -->
						<?php if(isset($category)): ?>
						<input type="hidden" name="id" value="<?php echo $category['id']?>" />
						<?php endif; ?>

					</form>
				</section>
			</div>

		</div>
	</body>
</html>
