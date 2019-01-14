<?php require_once 'tools/db.php'; ?>
<?php
if(isset($_GET['logout']) && isset($_SESSION['users'])){
    unset($_SESSION["users"]);
    unset($_SESSION["admin"]);
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>TravelWorld</title>
</head>
<body>
<?php require 'partials/header.php'; ?>
<?php if(isset($message)): ?>
    <div class="text-danger col-sm-8 offset-sm-2 mb-4"><?php echo $message; ?></div>
<?php endif; ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block w-100" src="assets/img/creteheader.jpg" data-src="holder.js/900x400?theme=social" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/haute-savoie.jpg" data-src="holder.js/900x400?theme=industrial" alt="Second slide">
        </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/paysage.jpg" data-src="holder.js/900x400?theme=industrial" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/Atlantic-Dunes.jpg" data-src="holder.js/900x400?theme=industrial" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/colmar.jpg" data-src="holder.js/900x400?theme=industrial" alt="Second slide">
        </div>
    </div>

</div>
<div id="reservation">
    <nav>
        <div class="nav " id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Vol</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Vol et Hôtel</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Hôtel</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade fly show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Vol Aller-Retour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Vol Simple</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade marge show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="fly.php" method="POST">
                        <div class="row">
                            <div class="column  col-md-3">
                                <div class="title">Ville de départ : </div>
                                <div class="forms">
                                    <select class="size" title="citydeparture" name="citydeparture">
                                    <option>Paris</option>
                                    </select>
                                </div>
                            </div>
                            <div class="column col-md-3">
                                <div class="title">À destination de : </div>
                                <div class="forms"><input class="form-control" type="text" placeholder="Destination" name="fly"/></div>
                            </div>

                            <div class="column col-md-3">
                                <div class="title">Date de départ : </div>
                                <div class="forms"><input title="departure" type="date"/></div>
                            </div>

                            <div class="column col-md-3">
                                <div class="title">Date de retour : </div>
                                <div class="forms"><input title="arrival" id="arrival" type="date"/></div>
                            </div>
                        </div>
                        <div class="row marge_form ">
                            <div class="column col-md-4">
                                <div class="title">Nombre de personne</div>
                                <div class="forms">
                                    <select class="size" title="people" name="people">
                                        <option>2 personnes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="column col-md-4 ">
                                <div class="title">Classe</div>
                                <div class="forms">
                                    <select class="size"  title="class" name="class">
                                        <option value="1">Peu importe</option>
                                        <option value="2" >Économique</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="search" name="searchfly" value="Rechercher"/>
                    </form>
                </div>


                <div class="tab-pane fade marge" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="fly.php"  method="POST">
                        <div class="row">
                            <div class="column col-md-4">
                                <div class="title ">Ville de départ : </div>
                                <div class=" forms">
                                    <select class="size" title="citydeparture" name="citydeparture">
                                    <option>Paris</option>
                                    </select>
                                </div>
                            </div>
                            <div class="column col-md-5">
                                <div class="title">À destination de : </div>
                                <div class="forms"><input class="form-control" type="text" placeholder="Destination" name="fly"/></div>
                            </div>

                            <div class="column col-md-3">
                                <div class="title">Date de départ : </div>
                                <div class="forms"><input title="departure" type="date"/></div>
                            </div>
                        </div>

                        <div class="row marge_form ">
                            <div class="column col-md-4">
                                <div class="title">Nombre de personne</div>
                                <div class="forms">
                                    <select class="size" title="people" name="people">
                                        <option>2 personnes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="column col-md-4 ">
                                <div class="title">Classe</div>
                                <div class="forms">
                                    <select class="size"  title="class" name="class">
                                        <option value="1">Peu importe</option>
                                        <option value="2">Économique</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="search" name="searchfly" value="Rechercher"/>
                    </form>
                </div>
            </div>
        </div>


        <div class="tab-pane fade marge" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <form action="article.php"  method="POST">
                <div class="row marge_form">
                    <div class="column col-md-3">
                        <div class="title">Ville de départ : </div>
                        <div class="forms">
                            <select class="size" title="citydeparture" name="citydeparture">
                            <option>Paris</option>
                            </select>
                        </div>
                    </div>
                    <div class="column col-md-3">
                        <div class="title">Trouvez un hôtel à  : </div>
                        <div class="forms"><input class="form-control" type="text" placeholder="Destination" name="destination"/></div>
                    </div>

                    <div class="column col-md-3">
                        <div class="title">Date de départ : </div>
                        <div class="forms"><input title="departure" type="date"/></div>
                    </div>

                    <div class="column col-md-3">
                        <div class="title">Date de retour : </div>
                        <div class="forms"><input title="arrival" type="date"/></div>
                    </div>
                </div>
                <div class="row marge_form ">
                    <div class="column col-md-4">
                        <div class="title">Nombre de personne</div>
                        <div class="forms">
                            <select class="size" title="people" name="people">
                                <option>2 personnes</option>
                            </select>
                        </div>
                    </div>
                    <div class="column col-md-4 ">
                        <div class="title">Classe</div>
                        <div class="forms">
                            <select class="size"  title="class" name="class">
                                <option value="1">Peu importe</option>
                                <option value="2">Économique</option>
                                <option value="3">Affaire</option>
                                <option value="4">Première</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" class="search" name="search" value="Rechercher"/>
            </form>
        </div>


        <div class="tab-pane fade marge align-items-center" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <form action="article.php"  method="POST">
                <div class="row marge_form">
                    <div class="column col-md-6">
                        <div class="title">Trouvez un hôtel à  : </div>
                        <div class="forms"><input class="form-control" type="text" placeholder="Destination" name="destination"/></div>
                    </div>

                    <div class="column col-md-3">
                        <div class="title">Date de départ : </div>
                        <div class="forms"><input title="departure" type="date"/></div>
                    </div>

                    <div class="column col-md-3">
                        <div class="title">Date de retour : </div>
                        <div class="forms"><input title="arrival" type="date"/></div>
                    </div>
                </div>

                <div class="row marge_form ">
                    <div class="column col-md-4">
                        <div class="title">Nombre de personne</div>
                        <div class="forms">
                            <select class="size" title="people" name="people">
                                <option>2 personnes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" class="search" name="searchHotel" value="Rechercher"/>
            </form>
        </div>
    </div>
</div>

<div class="holiday-choice d-flex justify-content-center  align-items-center">
    <ul class="nav " role="tablist">
        <li class="nav-item block-holiday">
            <a class="nav-links active " id="recommandation-tab" data-toggle="tab" href="#recommandation" role="tab" aria-controls="recommandation" aria-selected="true"> Conseillé</a>
        </li>
        <li class="nav-item block-holiday">
            <a class="nav-links black" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">Nouveautés</a>
        </li>
        <li class="nav-item block-holiday">
            <a class="nav-links" id="last-tab" data-toggle="tab" href="#last" role="tab" aria-controls="last" aria-selected="false">Dernières Minutes</a>
        </li>
    </ul>
</div>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="recommandation" role="tabpanel" aria-labelledby="recommandation-tab">
        <div class="container login ">
            <div class=" row travel-list   ">
                <?php
                $query = $db->query('SELECT * FROM kt_indexArticle WHERE hotel_category = 1');
                while($indexCard = $query->fetch()):
                    {?>
                        <div class="col-lg-4 col-md-6 cardmarge">
                            <div class="card  ">
                                <img class="size-picture" src="assets/img/<?php echo $indexCard['image']?>" alt="Card image cap"/>
                                <div class="price d-flex align-items-center justify-content-center"><?php echo $indexCard['price']?> </div>
                                <div class="card-body cardsize">
                                    <h4 class="card-title"><?php echo $indexCard['country']?> <?php echo $indexCard['city'] ?> </h4>
                                    <h5 ><?php echo $indexCard['hotel'] ?></h5>
                                    <p class="card-text">
                                        <?php echo $indexCard['content']   ?> </p>
                                    <div class=" d-flex justify-content-md-end align-items-md-end ">
                                        <a href="articleDescription.php?hotel_id=<?php echo $indexCard['id']; ?>" class="btn btn-blue">Voir le détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } endwhile; ?>
                <?php $query->closeCursor(); ?>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
        <div class="container login ">
            <div class=" row travel-list   ">
                <?php
                $query = $db->query('SELECT * FROM kt_indexArticle WHERE hotel_category = 2');
                while($indexCard = $query->fetch()):
                    {?>
                        <div class="col-lg-4 col-md-6 cardmarge">
                            <div class="card  ">
                                <img class="size-picture" src="assets/img/<?php echo $indexCard['image']?>" alt="Card image cap"/>
                                <div class="price d-flex align-items-center justify-content-center"><?php echo $indexCard['price']?> </div>
                                <div class="card-body cardsize">
                                    <h4 class="card-title"><?php echo $indexCard['country']?> <?php echo $indexCard['city'] ?> </h4>
                                    <h5 ><?php echo $indexCard['hotel'] ?></h5>
                                    <p class="card-text">
                                        <?php echo $indexCard['content']   ?> </p>
                                    <div class=" d-flex justify-content-md-end align-items-md-end ">
                                        <a href="articleDescription.php?hotel_id=<?php echo $indexCard['id']; ?>" class="btn btn-blue">Voir le détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } endwhile; ?>
                <?php $query->closeCursor(); ?>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="last" role="tabpanel" aria-labelledby="last-tab">
        <div class="container login ">
            <div class=" row travel-list   ">
                <?php
                $query = $db->query('SELECT * FROM kt_indexArticle WHERE hotel_category = 3');
                while($indexCard = $query->fetch()):
                    {?>
                        <div class="col-lg-4 col-md-6 cardmarge">
                            <div class="card  ">
                                <img class="size-picture" src="assets/img/<?php echo $indexCard['image']?>" alt="Card image cap"/>
                                <div class="price d-flex align-items-center justify-content-center"><?php echo $indexCard['price']?> </div>
                                <div class="card-body cardsize">
                                    <h4 class="card-title"><?php echo $indexCard['country']?> <?php echo $indexCard['city'] ?> </h4>
                                    <h5 ><?php echo $indexCard['hotel'] ?></h5>
                                    <p class="card-text">
                                        <?php echo $indexCard['content']   ?> </p>
                                    <div class=" d-flex justify-content-md-end align-items-md-end ">
                                        <a href="articleDescription.php?hotel_id=<?php echo $indexCard['id']; ?>" class="btn btn-blue">Voir le détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } endwhile; ?>
                <?php $query->closeCursor(); ?>
            </div>
        </div>
    </div>

    <?php require 'partials/footer.php'; ?>

</body>
</html>
