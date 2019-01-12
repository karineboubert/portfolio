<?php

require_once '../tools/db.php';
if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
	header('location:../index.php');
	exit;
}

?>

<!DOCTYPE html>
<html>
	<head>

		<title>AdminPage !</title>

		<?php require 'partials/head_assets.php'; ?>

	</head>
	<body class="index-body">
		<?php require 'partials/header.php'; ?>
		<div class="container-fluid">
			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<main class="col-12"> <br/>

					<img  src="../assets/img/creteheader.jpg"/>
				</main>
			</div>

		</div>
	</body>
</html>
