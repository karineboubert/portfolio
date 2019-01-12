<?php require_once 'tools/db.php'; ?>

<?php

$search = $db->query('SELECT * FROM indexArticle ');

if(isset($_POST['destination']) AND !empty($_POST['destination'])) {
    $destination = htmlspecialchars($_POST['destination']);
    $search = $db->query('SELECT * FROM indexArticle  WHERE country LIKE "%'.$destination.'%" ');

}else{
        $message = 'Veuillez remplir le champ "destination" pour affiner votre recherche';
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
    <link rel="stylesheet" href="assets/css/article.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Recherche</title>
</head>
<body>

<?php require 'partials/header.php'; ?>
<div class="row">
    <div class="col-lg-3 col-md-4 research-filter">
        <div class="research">
            <h2>Ma recherche</h2>

            <form  method="POST">
                <div class="col-sm-12 padding">
                    <label for="destination">Destination</label>
                    <input class="form-control" type="text" placeholder="Destination" name="destination" id="destination" />
                </div>

                <div class="col-sm-12 d-flex flex-column padding">
                    <label for="date-of-departure">Date de départ</label>
                    <input title="date-of-departure" id="date-of-departure" type="date"/>
                </div>

                <div class="col-sm-12 d-flex flex-column padding ">
                    <label for="return-date">Date de retour</label>
                    <input title="return-date" id="return-date" type="date"/>
                </div>

                <input type="submit" class="search"  value="Actualiser ma recherche"/>
            </form>
        </div>


        <div class="filter">
            <div id="accordion" role="tablist">
                <div class="card">
                    <div class="card-header " role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h2 class="center ">Filter</h2>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-body fw-blue">
                            <form  method="POST">
                                <div class="col-sm-12 d-flex flex-column padding">
                                    <label for="budget">Budget</label>
                                    <div class="col-md-3 forms">
                                        <select class="size" title="budget" name="budget">
                                            <option value="0"> 0 - 500 €</option>
                                            <option value="1"> 500 - 1000 €</option>
                                            <option value="2"> 1000 - 1500 €</option>
                                            <option value="3"> 1500 - 2000 €</option>
                                            <option value="4"> Plus de 2000 €</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex flex-column padding">
                                    <label for="category">Catégorie de pension</label>
                                    <div class="d-flex justify-content-between">Tous Compris <input type="radio" name="category" value="1" title="complete" /></div>
                                    <div class="d-flex justify-content-between">Demi-Pension <input type="radio" name="category" value="2" title="half" /></div>
                                    <div class="d-flex justify-content-between">Petit Déjeuner <input type="radio" name="category" value="3" title="breakfast" /></div>
                                    <div class="d-flex justify-content-between">Sans Pension <input type="radio" name="category" value="4" title="without-pension" /></div>
                                </div>

                                <div class="col-sm-12 d-flex flex-column padding">
                                    <label for="star"> Nombre d'étoile</label>
                                    <div class="d-flex justify-content-between"> ** <input type="radio" name="star" value="star2" title="9" /></div>
                                    <div class="d-flex justify-content-between"> *** <input type="radio" name="star" value="star3" title="10" /></div>
                                    <div class="d-flex justify-content-between"> **** <input type="radio" name="star" value="star4" title="11" /></div>
                                    <div class="d-flex justify-content-between"> ***** <input type="radio" name="star" value="star5" title="12" /></div>
                                </div>

                                <div class="col-sm-12 d-flex flex-column padding">
                                    <label for="services">Services</label>
                                    <div class="d-flex justify-content-between"> WIFI dans l'hébergement <input type="checkbox" name="form" value="5" title="wifi" /></div>
                                    <div class="d-flex justify-content-between"> Parking <input type="checkbox" name="services" value="6" title="parking" /></div>
                                    <div class="d-flex justify-content-between"> Piscine <input type="checkbox" name="services" value="7" title="pool"/></div>
                                    <div class="d-flex justify-content-between"> Animaux autorisés <input type="checkbox" name="services" value="8" title="pets"/></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 col-md-8">
        <?php if(!empty($_POST['destination'])){ ?>
            <?php if($search->rowCount() > 0) { ?>

                <?php while($s = $search->fetch()) { ?>
                    <div class="card travel d-flex flex-row">
                        <img class="card-img-top" src="assets/img/<?php echo $s['image'] ?>" alt="Card image cap">
                        <div class="price d-flex align-items-center justify-content-center"><?php echo $s['price'] ?> </div>
                        <div class="card-body cardsize">
                            <h4 class="card-title"><?php echo $s['country'] ?><?php echo $s['city'] ?> </h4>
                            <h5><?php echo $s['hotel'] ?></h5>
                            <a href="articleDescription.php?hotel_id=<?php echo $s['id'] ?>" class="btn btn-blue">Voir le détail</a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                Aucun résultat pour: <?php echo $destination ?>...
            <?php } ?>
        <?php } else { ?>

            <?php if(isset($message)): ?>
                <div class=" margin text-info col-sm-8 offset-sm-2 mb-4"><?php echo $message; ?></div>
            <?php endif; ?>
           <h3>Idées voyages:</h3>
            <?php $query = $db->query('SELECT * FROM indexArticle ORDER BY id DESC LIMIT 0, 5');
            ?>
            <?php while($ideatravel = $query->fetch()): ?>
            <div class="card travel d-flex flex-row">
                <img class="card-img-top" src="assets/img/<?php echo $ideatravel['image'] ?>" alt="Card image cap">
                <div class="price d-flex align-items-center justify-content-center"><?php echo $ideatravel['price'] ?> </div>
                <div class="card-body cardsize">
                    <h4 class="card-title"><?php echo $ideatravel['country'] ?><?php echo $ideatravel['city'] ?> </h4>
                    <h5><?php echo $ideatravel['hotel'] ?></h5>
                    <a href="articleDescription.php?hotel_id=<?php echo $ideatravel['id'] ?>" class="btn btn-blue">Voir le détail</a>
                </div>
            </div>
            <?php endwhile; ?>

            <?php $query->closeCursor(); ?>

        <?php } ?>

    </div>

    <div class="col-lg-4 maps">
        <div id="map"></div>
        <?php require 'assets/js/map.php'; ?>
    </div>

</div>
<?php require 'partials/footer.php'; ?>

</body>
</html>

