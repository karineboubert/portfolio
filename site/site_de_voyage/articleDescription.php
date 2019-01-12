<?php require_once 'tools/db.php';

if(isset($_GET['hotel_id'] ) ){

//selection de l'article dont l'ID est envoyé en paramètre GET

    $query = $db->prepare('SELECT * FROM indexArticle FULL JOIN trip ON id = idTrip WHERE id = ? ');
    $query->execute( array( $_GET['hotel_id'] ) );
    $travel = $query->fetch();

    //si pas d'article trouvé dans la base de données, renvoyer l'utilisateur vers la page index
   if(!$travel){
    header('location:index.php');
    exit;
    }
}
else{ //si article_id n'est pas envoyé en URL, renvoyer l'utilisateur vers la page index
header('location:index.php');
exit;
}

if(isset($_GET['hotel_id'] ) ){

    //selection de l'article dont l'ID est envoyé en paramètre GET
    $query = $db->prepare('
		SELECT indexArticle.*, GROUP_CONCAT(category.name_category SEPARATOR " , ") AS categories 
		FROM indexArticle
		JOIN article_category ON indexArticle.id = article_category.article_id
		JOIN category ON article_category.category_id = category.id
		WHERE indexArticle.id = ?
	');
    $query->execute( array( $_GET['hotel_id'] ) );
    $article = $query->fetch();

    //si pas d'article trouvé dans la base de données, renvoyer l'utilisateur vers la page index
    if(!$article['id']){
        header('location:index.php');
        exit;
    }

}
else{ //si article_id n'est pas envoyé en URL, renvoyer l'utilisateur vers la page index
    header('location:index.php');
    exit;
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
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/articleDescription.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title> <?php echo $travel['hotel']; ?> </title>
</head>
<body>
<?php require 'partials/header.php'; ?>

<ul class="breadcrumb">
    <li><a href="index.php">Home </a></li>
    <li><a href="article.php">Recherche</a></li>
    <li><?php echo $travel['hotel']  ?></li>
</ul>

    <div class="container-fluid" id="gallery">
        <article>
           <div class="container marge">

               <div class="row ">

                   <div class="col-md-6 nopadding margin">
                       <div class="mySlides">
                           <div class="numbertext">1 / 6</div>
                           <img class="size" src="assets/img/<?php echo $travel['image'] ?>" >
                       </div>

                       <div class="mySlides">
                           <div class="numbertext">2 / 6</div>
                           <img class="size"src="assets/img/<?php echo $travel['img'] ?>">
                       </div>

                       <div class="mySlides">
                           <div class="numbertext">3 / 6</div>
                           <img class="size" src="assets/img/<?php echo $travel['home_img'] ?>">
                       </div>

                       <div class="mySlides">
                           <div class="numbertext">4 / 6</div>
                           <img class="size" src="assets/img/<?php echo $travel['room_img'] ?>">
                       </div>

                       <div class="mySlides">
                           <div class="numbertext">5 / 6</div>
                           <img class="size" src="assets/img/<?php echo $travel['desk_img'] ?>">
                       </div>

                       <div class="mySlides">
                           <div class="numbertext">6 / 6</div>
                           <img class="size" src="assets/img/<?php echo $travel['resto_img'] ?>">
                       </div>

                       <a class="prev" onclick="plusSlides(-1)">❮</a>
                       <a class="next" onclick="plusSlides(1)">❯</a>

                       <div class="caption-container">
                           <p id="caption"></p>
                       </div>

                       <div class="row gallery_picture">
                           <div class="column">
                               <img class="demo cursor image" src="assets/img/<?php echo $travel['image'] ?>"  onclick="currentSlide(1)" alt="<?php echo $travel['hotel'] ?>">
                           </div>
                           <div class="column">
                               <img class="demo cursor" src="assets/img/<?php echo $travel['img'] ?>"  onclick="currentSlide(2)" alt="<?php echo $travel['hotel'] ?>">
                           </div>
                           <div class="column">
                               <img class="demo cursor" src="assets/img/<?php echo $travel['home_img'] ?>"  onclick="currentSlide(3)" alt="<?php echo $travel['hotel'] ?>">
                           </div>
                           <div class="column">
                               <img class="demo cursor" src="assets/img/<?php echo $travel['room_img'] ?>"  onclick="currentSlide(4)" alt="<?php echo $travel['hotel'] ?>">
                           </div>
                           <div class="column">
                               <img class="demo cursor" src="assets/img/<?php echo $travel['desk_img'] ?>"  onclick="currentSlide(5)" alt="<?php echo $travel['hotel'] ?>">
                           </div>
                           <div class="column">
                               <img class="demo cursor" src="assets/img/<?php echo $travel['resto_img'] ?>" onclick="currentSlide(6)" alt="<?php echo $travel['hotel'] ?>">
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6" id="white">
                       <div class="row">
                            <div class="col-md-7 d-flex justify-content-center flex-column margin">
                               <h4><?php echo $travel['country']?> <?php echo $travel['city'] ?> </h4><br/>
                               <h5><?php echo $travel['hotel'] ?></h5><br/>
                               <?php echo $travel['content']   ?> <a href="#readmore "> Lire la suite</a>
                            </div>
                            <div class="col-md-5 align-items-center nopadding">
                                <div class="price d-flex align-items-center justify-content-center"><?php echo $travel['price']?> </div> <br/>
                                <div id="summary">
                                    <h3 id="sum">Sommaire</h3>
                                    <ul>
                                        <li><a class="summary-text" href="#room"> Hébergement</a></li>
                                        <li><a class="summary-text" href="#information"> Le prix comprend et ne comprend pas</a></li>
                                        <li><a class="summary-text" href="#readmore"> A l'essentiel </a></li>
                                        <li><a class="summary-text" href="#detail"> En détail </a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
               </div
           </div>
        </article>
    </div>

    <div class="container-fluid ">
        <div class="row justify-content-center m-4  " id="room">
            <div class="col-md-5 room  ">
                <div class=" row justify-content-between align-items-center ">
                    <h2> <span><i class="fas fa-bed"></i></span><u>Chambre Standard</u></h2> <br/>
                    <h5><?php echo $travel['priceRoom']?>€</h5>
                </div> <br/>
                <div class=" row align-items-center ">
                    <p class="col-xl-9 col-md-12"> La Chambre est équipée d’un lit double 180cm  ou de deux lits simples 2x90cm (sur demande lors de la réservation) et d'une télévision. Mini-bar payant à disposition. Des peignoirs et des chaussons sont à votre disposition.
                    </p>
                    <a  href="cart.php" class="btn select">Sélectionner</a>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class=" row justify-content-between align-items-center ">
                    <h2><span><i class="far fa-star"></i></span></i><u>Chambre Supérieur</u></h2><br/>
                    <h5><?php echo $travel['priceRoomSup']?>€</h5>
                </div><br/>
                <div class=" row align-items-center ">
                    <p class="col-xl-9 col-md-12"> La Chambre Double Supérieure est équipée d’un lit double 180cm ou de deux lits simples 2x90cm (sur demande lors de la réservation), d’une climatisation individuelle, d'un mini-bar gratuit et d'un espace bureau. Des peignoirs et des chaussons sont à votre disposition.
                    </p>
                    <a  href="cart.php" class="btn select">Sélectionner</a>
                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid ">
        <div class="row justify-content-center " id="information">
            <div class="col-md-5 margin">
                <h2 class="title">CE PRIX TTC COMPREND</h2>
                <?php echo $travel['price_have']?>
            </div>
            <div class="col-md-5 margin">
                <h2 class="title">CE PRIX TTC NE COMPREND PAS</h2>
                <?php echo $travel['price_dont']?>
            </div>
        </div>
    </div>



    <div class="container " id="description">
        <h1 id="readmore">A L'ESSENTIEL</h1>
        <?php echo $travel['essential']?> <br/><br/>


        <h1> Categorie de l'hôtel</h1>
        <?php echo $article['categories']; ?>.<br/><br/>

        <h1 id="detail">EN DÉTAIL</h1>
        <?php echo $travel['detail']?>
    </div>


<?php require 'partials/footer.php'; ?>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</body>
</html>
