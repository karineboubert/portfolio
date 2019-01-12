<?php
require_once '../tools/db.php';

if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

if(isset($_POST['save'])){
    $query = $db->prepare('INSERT INTO user (firstname, lastname, password, email, admin, address, postal_code, city, mobile, date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $newUser = $query->execute(
			[
				$_POST['firstname'],
				$_POST['lastname'],
				hash('md5', $_POST['password']),
				$_POST['email'],
				$_POST['admin'],
				$_POST['address'],
				$_POST['postal_code'],
				$_POST['city'],
				$_POST['mobile'],
				$_POST['date_of_birth'],

			]
    );

	if($newUser){
		header('location:user-list.php');
		exit;
    }
	else{
		$message = "Impossible d'enregistrer le nouvel utilisateur...";
	}
}

if(isset($_POST['update'])){

	$queryString = 'UPDATE user SET
		firstname = :firstname,
		lastname = :lastname,
		email = :email,
		admin = :admin,
		address = :address,
		postal_code = :postal_code,
		city = :city,
		mobile = :mobile,
		date_of_birth = :date_of_birth';

	//données du formulaire
	$queryParameters =
		[
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'email' => $_POST['email'],
			'admin' => $_POST['admin'],
			'address' => $_POST['address'],
			'postal_code' => $_POST['postal_code'],
			'city' => $_POST['city'],
			'mobile' => $_POST['mobile'],
			'date_of_birth' => $_POST['date_of_birth'],
			'id' => $_POST['id'],
		];
		if( !empty($_POST['password'])) {
			$queryString .= ', password = :password ';
			$queryParameters['password'] = hash('md5', $_POST['password']);
		}

		$queryString .= 'WHERE id = :id';

		$query = $db->prepare($queryString);
		$result = $query->execute($queryParameters);

	if($result){
		header('location:user-list.php');
		exit;
	}
	else{
		$message = 'Erreur.';
	}
}

if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){

	$query = $db->prepare('SELECT * FROM user WHERE id = ?');
  $query->execute(array($_GET['user_id']));
	$user = $query->fetch();
}

?>

<!DOCTYPE html>
<html>
	<head>

		<title>Administration des utilisateurs</title>

		<?php require 'partials/head_assets.php'; ?>

	</head>
	<body class="index-body">
		<?php require 'partials/header.php'; ?>
		<div class="container-fluid">



			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-12">
					<header class="pb-3">
						<h4><?php if(isset($user)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un utilisateur</h4>
					</header>

					<?php if(isset($message)): ?>
					<div class="bg-danger text-white">
						<?php echo $message; ?>
					</div>
					<?php endif; ?>


					<form action="user-form.php" method="post">
						<div class="form-group">
							<label for="firstname">Prénom :</label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['firstname']?>"<?php endif; ?> type="text" placeholder="Prénom" name="firstname" id="firstname" />
						</div>
						<div class="form-group">
							<label for="lastname">Nom de famille : </label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['lastname']?>"<?php endif; ?> type="text" placeholder="Nom de famille" name="lastname" id="lastname" />
						</div>
						<div class="form-group">
							<label for="email">Email :</label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['email']?>"<?php endif; ?> type="email" placeholder="Email" name="email" id="email" />
						</div>
						<div class="form-group">
							<label for="password">Password : </label>
							<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['password']?>"<?php endif; ?> type="password" placeholder="Mot de passe" name="password" id="password" />
						</div>
						<div class="form-group">
							<label for="address">Adresse :</label>
							<textarea class="form-control" name="address" id="address" placeholder="Adresse"><?php if(isset($user)): ?><?php echo $user['address']?><?php endif; ?></textarea>
						</div>

						<div class="form-group">
							<label for="postal_code">Code Postal<b class="text-danger">*</b></label>
								<input class="form-control" value="<?php if(isset($user)): ?><?php echo $user['postal_code']?><?php endif; ?>"  type="text" placeholder="Code Postal"  name="postal_code" id="postal_code" />
							</div>
							<div class="form-group">
								<label for="city">Ville :</label>
								<input class="form-control" <?php if(isset($user)): ?>value="<?php echo $user['city']?>"<?php endif; ?> type="text" placeholder="Ville" name="city" id="city" />
							</div>
							<div class="form-group">
								<label for="mobile">Téléphone<b class="text-danger">*</b></label>
									<input class="form-control" value="<?php if(isset($user)): ?><?php echo $user['mobile']?><?php endif; ?>"  type="text" placeholder="Téléphone"  name="mobile" id="mobile" />
								</div>
								<div class="form-group">
									<label for="date_of_birth">Date d'anniversaire<b class="text-danger">*</b></label>
										<input class="form-control" value="<?php if(isset($user)): ?><?php echo $user['date_of_birth']?><?php endif; ?>"  type="date" name="date_of_birth" id="date_of_birth" />
									</div>


							<div class="form-group">
								<label for="admin"> Admin ?</label>
								<select class="form-control" name="admin" id="admin">
									<option value="0" <?php if(isset($user) && $user['admin'] == 0): ?>selected<?php endif; ?>>Non</option>
									<option value="1" <?php if(isset($user) && $user['admin'] == 1): ?>selected<?php endif; ?>>Oui</option>
								</select>
							</div>

							<div class="text-right">
								<?php if(isset($user)): ?>
								<input class="btn black" type="submit" name="update" value="Mettre à jour" />

								<?php else: ?>
								<input class="btn blue" type="submit" name="save" value="Enregistrer" />
								<?php endif; ?>
							</div>

							<?php if(isset($user)): ?>
							<input type="hidden" name="id" value="<?php echo $user['id']?>" />
							<?php endif; ?>

					</form>
				</section>
			</div>

		</div>
	</body>
</html>
