<?php require_once 'tools/db.php'; ?>

<?php

$searchfly = $db->query('SELECT * FROM fly');

if(isset($_POST['searchfly'])){

    if (isset($_POST['fly']) AND !empty($_POST['fly'])) {
        $fly = htmlspecialchars($_POST['fly']);
        $searchfly = $db->query('SELECT * FROM fly WHERE fly_country LIKE "%' . $fly . '%"');
    }else {
        $messagefly = 'Veuillez remplir le champ "destination" pour trouver le vol qui vous correspond';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/fly.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Recherche avion</title>
</head>
<body>

<?php require 'partials/header.php'; ?>

    <div class="row">
        <div class="col-lg-5 col-md-5 research-filter">
            <div class="research">
                <h2>Ma recherche</h2>
                <form  method="POST">
                    <div class="col-sm-12 padding">
                        <label for="destination">Destination</label>
                        <input class="form-control" type="text" placeholder="Destination" name="fly" />
                    </div>

                    <div class="col-sm-12 d-flex flex-column padding">
                        <label for="date-of-departure">Date de départ</label>
                        <input title="date-of-departure" id="date-of-departure" type="date"/>
                    </div>

                    <div class="col-sm-12 d-flex flex-column padding ">
                        <label for="fly_name">Compagnie</label>
                            <select  name="fly_name" id="fly_name">
                                <option value="Peu importe">Peu importe</option>
                                <option value="Transavia">Transavia</option>
                                <option value="EasyJet">EasyJet</option>
                                <option value="Air France">Air France</option>
                            </select>
                    </div>


                    <div class="col-sm-12 d-flex flex-column padding ">
                        <label for="class">Classe</label>
                        <select>
                            <option value="1">Peu importe</option>
                            <option value="2" >Économique</option>
                        </select>
                    </div>

                    <input type="submit" class="searchfly" name="searchfly"  value="Actualiser ma recherche"/>
                </form>
            </div>
        </div>



        <div class="col-lg-7 col-md-7">
            <?php if(!empty($_POST['fly'])){ ?>
                <?php if($searchfly->rowCount() > 0) { ?>
                    <?php while($sf = $searchfly->fetch()) { ?>
                        <div class="card travel d-flex flex-row">
                            <img class="card-img-top" src="assets/img/<?php echo $sf['fly_img'] ?>" alt="Card image cap">
                            <div class="price d-flex align-items-center justify-content-center"><?php echo $sf['fly_price'] ?> </div>
                            <div class="card-body cardsize">
                                <h4 class="card-title"><?php echo $sf['fly_country'] ?> </h4>
                                <h5> Compagnie:  <?php echo $sf['fly_name'] ?></h5>
                                <h5> Durée du vol:  <?php echo $sf['hours'] ?></h5>
                                <form action='cart2.php' method='POST'>
                                  <button type='submit' class='add'/>Ajouter <span> au panier</span></button>
                                  <input type="hidden" name="fly_id" value="<?php echo $fly['id']; ?>"/>
                                </form>

                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    Aucun résultat pour: <?php echo $fly ?>...
                <?php } ?>
            <?php } else { ?>
                <?php if(isset($messagefly)): ?>
                    <div class="text-info margin col-sm-8 offset-sm-2 mb-4"><?php echo $messagefly; ?></div>
                <?php endif; ?>
            <?php } ?>
        </div>

    </div>

<?php require 'partials/footer.php'; ?>
</body>
</html>
