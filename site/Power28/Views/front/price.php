<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/price.css">
    <title>Tarification</title>
</head>
<body>
<?php require 'partials/header.php'; ?>

<div class=" banner d-flex align-items-center justify-content-center">
    <h3>Tarification</h3>
</div>

<div id="pricing" class="container">
    <div class="row d-flex justify-content-around">
        <div class=" col-sm-12 col-md-5 ml-4 priceCard">
            <div class="card-body ">
                <img class="card-img-top bold power mx-auto d-block" src="assets/img/logo.png" alt="logo"><br/>
                <h4 class="card-title title center">Logiciel Power28</h4><br/>
                <h2 class="card-title bold center">1200 € H.T</h2>
                <h6 class="card-subtitle mb-2 text-muted center"><a href="http://store.filemaker.com">(Licence FileMaker
                        Pro non incluse)</a></h6>
                <br/>
                <div class="card-text">
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Licence unique par site, par entreprise</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Nombre d'utilisateurs illimités</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/no.png" alt="check">
                        <p class="col-10">Formation de vos collaborateurs</p>
                    </div>
                    <div class="have row">
                        <img class=" check" src="assets/img/no.png" alt="check">
                        <p class="col-10">Hébergement de votre base de donnée non inclus, voir la section Hébergement &
                            FileMaker Server.</p>
                    </div>
                </div>
                <br/>
            </div>
        </div>
        <div class=" col-sm-12 col-md-5 priceCard">
            <div class="card-body">
                <img class="card-img-top bold mx-auto d-block" id="filesmaker" src="assets/img/filesmaker.png"
                     alt="logofilesmaker"><br/>
                <h4 class="card-title title center">Hébergement FileMaker</h4><br/>
                <h2 class="card-title bold center">50 € H.T /mois</h2>
                <h6 class="card-subtitle mb-2 text-muted center">Renouvellement Annuel (558€)</h6>
                <br/>
                <div class="card-text">
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Nombre de base ouverte : 1</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Espace disque : 10Go</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">WebDirect et PHP : Oui</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Sauvegardes régulières : Journalières</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Sauvegarde Distante : Oui</p>
                    </div>
                    <div class="have row">
                        <img class="check" src="assets/img/yes.png" alt="check">
                        <p class="col-10">Frais d’installation : Inclus</p>
                    </div>
                    <br/>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="" class="titleBlack" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <h6><u>PLUS DE DÉTAILS</u></h6>
                    </a>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content  priceCard">
                            <h5 class="center"><u>Hébergement FilesMaker</u></h5>
                            <div class="row">
                                <div class="col-sm-12 col-md-4  d-flex align-items-center responsive">
                                    <img class="shadow mx-auto d-block " id="software" src="assets/img/filemaker.jpg"
                                         alt="software">
                                </div>
                                <div class=" col-sm-12 col-md-8">
                                    <p class="text paddingText">
                                        Nous sommes spécialisés dans l’hébergement de bases de données FileMaker depuis
                                        2010. Nous utilisons une infrastructure moderne et flexible permettant
                                        de réduire les coûts tout en offrant une disponibilité maximale et une rapidité
                                        de connexion concurrentielle.<br/><br/>
                                        En choisissant votre hébergement auprès de Power28, vous faites le choix
                                        d’un prix bas, d’une qualité de réseau renforcée et d’une sécurité accrue car
                                        nous sauvegardons toutes nos bases de données toutes les 2 heures, tous les
                                        jours, toutes les semaines et tous les mois, sur 2 sites distants afin d’éviter
                                        toute perte de données.<br/><br/>
                                        <b>Coût, Qualité, Sécurité, Disponibilité</b><br/><br/>
                                        1 seul prix simple et accessible pour votre base de donnée.<br/><br/>
                                        Ce sont les 4 maîtres-mots de Power28 concernant l’hébergement FileMaker et
                                        l’hébergement de vos bases de données d’entreprise.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn blackButton" data-dismiss="modal">FERMER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 margin ">
            <?php if (isset($message)): ?>
                <div class="alert alert-danger center" role="alert"><?php echo $message; ?><br/></div>
            <?php endif; ?>
            <form action="index.php?page=card" class=" d-flex justify-content-around flex-wrap " method="post">
                <div class="col-12 col-md-6 ">
                    <input type="checkbox" name="price_power28" title="price_power28" value="1200"
                           onClick="test(this);"> <b class="checkboxTitle">Acheter le logiciel (1200€)</b><br/>
                    <input type="checkbox" name="price_training" title="price_training" value="800"
                           onClick="test(this);"> <b class="checkboxTitle">Demi journée de formation (800€)</b>
                </div>
                <div class="col-12 col-md-6">
                    <input type="checkbox" name="price_filesMaker" title="price_filesMaker" value="600"
                           onClick="test(this);"> <b class="checkboxTitle"> Acheter l'hébergement FilesMaker (600€/
                        an)</b>
                </div>
                <br/><br/>
                <div class="d-flex align-items-end flex-column col-lg-12 pb-4">
                    <div class="row d-flex align-items-center  nomargin">
                        <h4><b>Total HT : </b> <span id="Totalcost"> </span></h4>
                    </div>
                    <div class="row d-flex align-items-center  nomargin">
                        <h5><b>TVA (20%) : </b> <span id="TVA"> </span></h5>
                    </div>
                    <br/>
                    <div class="row d-flex align-items-center  nomargin">
                        <h3><b>Total TTC : </b> <span id="totalPrice"> </span></h3>
                    </div>
                    <br/>
                    <input class="btn blackButton nomargin" type="submit" name="submit" value="ACHETER"/>
                </div>
                <br/>
            </form>
        </div>
    </div>
</div>


<div class="banner d-flex align-items-center justify-content-center">
    <h3 class="center">Recommandation pour achats complémentaires</h3>
</div>



<div class="container">
     <div class="row justify-content-around padding nomargin">
         <div class="col-md-12 col-lg-5"><br/>
              <h6 class="center bold responsiveTitle">Modèle d'imprimante</h6><br/>
              <div class="row borderBlack">
                  <img class="picture mag30 mx-auto d-block" src="assets/img/labelwriter.png" alt="home">
                  <div class="descriptive col-12">
                      <h5>LabelWriter™ 450 </h5>
                      <a href="http://www.dymo.com/fr-FR/labelwriter-450-label-printer">Retrouvez ce produit ici</a><br/><br/>
                      <h5>Etiquettes Dymo 11352</h5>
                      <a href="http://www.dymo.com/fr-FR/labelwriter-450-label-printer">Retrouvez ce produit ici</a>
                  </div>
              </div>
         </div>
          <div class="col-md-12 col-lg-5"><br/>
              <h6 class="center bold responsiveTitle">Marque de scan QR code en bluetooth</h6><br/>
              <div class="col-12 nopadding borderBlack">
                  <div class="mySlides">
                      <div class="numbertext">1 / 4</div>
                      <img src="assets/img/honeywell.jpg" style="width:100%">
                  </div>

                  <div class="mySlides">
                      <div class="numbertext">2 / 4</div>
                      <img src="assets/img/opticon2.jpg" style="width:100%">
                  </div>

                  <div class="mySlides">
                      <div class="numbertext">3 / 4</div>
                      <img src="assets/img/datalogic1.jpg" style="width:100%">
                  </div>

                  <div class="mySlides">
                      <div class="numbertext">4 / 4</div>
                      <img src="assets/img/datalogic2.jpg" style="width:100%">
                  </div>
              </div>

              <div class="description borderBlack align-items-center">
                  <p id="caption" class="nomargin"></p>
              </div>
              <div class="row nomargin">
                  <div class="column">
                      <img class="demo cursor" src="assets/img/honeywell.jpg" onclick="currentSlide(1)"
                           alt="<h5>HoneyWell</h5><a href='https://country.honeywellaidc.com/fr-FR/Pages/Category.aspx?category=2d-barcode-scanner&cat=HSM'><br/>Retrouvez les produits de cette marque ici</a>">
                  </div>
                  <div class="column">
                      <img class="demo cursor" src="assets/img/opticon2.jpg" onclick="currentSlide(2)"
                           alt="<h5>Opticon</h5><a href='http://opticon.com/product/opi-3301i/'><br/>Retrouvez ce produit ici</a>">
                  </div>
                  <div class="column">
                      <img class="demo cursor" src="assets/img/datalogic1.jpg" onclick="currentSlide(3)"
                           alt="<h5>Datalogic RIDA DBT6400 Retail</h5><a href='https://www.datalogic.com/fra/produits/points-de-vente/lecteurs-manuels/rida-dbt6400-retail-pd-714.html'><br/>Retrouvez ce produit ici</a>">
                  </div>
                  <div class="column">
                      <img class="demo cursor" src="assets/img/datalogic2.jpg" onclick="currentSlide(4)" alt="<h5>Datalogic RIDA DBT6400 Healthcare</h5><a href=' https://www.datalogic.com/fra/produits/sante/lecteurs-manuels/rida-dbt6400-healthcare-pd-715.html'><br/>Retrouvez ce produit ici</a>">
                  </div>
              </div>
          </div>
     </div>
</div>



<?php require 'partials/footer.php'; ?>
<script type="text/javascript">

    var total = 0;

    function test(item) {
        if (item.checked) {
            total += parseInt(item.value);
        } else {
            total -= parseInt(item.value);
        }
        //recupère syntaxe html
        document.getElementById('Totalcost').innerHTML = total + "€";
        document.getElementById('TVA').innerHTML = (total / 100) * 20 + "€";
        document.getElementById('totalPrice').innerHTML = total + (total / 100) * 20 + "€ ";
    }

</script>
<script src="assets/js/gallery.js"></script>
</body>
</html>