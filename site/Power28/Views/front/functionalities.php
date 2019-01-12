<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/functionalities.css">
    <title>Fontionnalités</title>
</head>
<body>
<?php require 'partials/header.php'; ?>

<div class=" banner d-flex align-items-center justify-content-center">
    <h3 class="nomargin">Fonctionnalités </h3>
</div>

<div id="picture-homepage">
    <img id="board" src="assets/img/boardFunctionnalities.png"/>
    <img id="respboard" src="assets/img/respfunctionnalities.png"/>
</div>

<div class="banner">
    <ul class="nav nav-pills d-flex align-items-center justify-content-around" id="pills-tab" role="tablist">
        <li class="nav-item col-sm-12 col-md-auto ">
            <a class="nav-link whiteText active center" id="pills-catalog-tab" data-toggle="pill" href="#pills-catalog" role="tab" aria-controls="pills-catalog" aria-selected="false">Catalogue</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-category-tab" data-toggle="pill" href="#pills-category" role="tab" aria-controls="pills-category" aria-selected="false">Catégorie</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-scan-tab" data-toggle="pill" href="#pills-scan" role="tab" aria-controls="pills-scan" aria-selected="false">Scan</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-transaction-tab" data-toggle="pill" href="#pills-transaction" role="tab" aria-controls="pills-transaction" aria-selected="false">Transaction Stock</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-manufacturers-tab" data-toggle="pill" href="#pills-manufacturers" role="tab" aria-controls="pills-manufacturers" aria-selected="true">Fabricants</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-providers-tab" data-toggle="pill" href="#pills-providers" role="tab" aria-controls="pills-providers" aria-selected="false">Fournisseurs</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-order-tab" data-toggle="pill" href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false">Commande</a>
        </li>
        <li class="nav-item col-sm-12 col-md-auto">
            <a class="nav-link whiteText center" id="pills-place-tab" data-toggle="pill" href="#pills-place" role="tab" aria-controls="pills-place" aria-selected="false">Lieu</a>
        </li>
    </ul>
</div>

<div class="container">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade padding show active" id="pills-catalog" role="tabpanel" aria-labelledby="pills-catalog-tab">

            <h4 class="bold" id="catalog"><u>Catalogue</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between ">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Catalogue1.png" alt="catalog">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Power28 contient votre catalogue produit. Chaque produit possède des caractéristiques propres et est lié à toutes les transactions de stock, entrées et sorties utiles à la gestion de votre stock.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue2.png" alt="catalog">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Chaque produit du catalogue peut contenir un nombre important de caractéristiques physiques ou financières utiles à la valorisation du stock. Les produits peuvent également être liés à une catégorie, un fabricant ou un ou plusieurs fournisseurs (grâce aux références fournisseurs *image n°5)</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue3.png" alt="catalog">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Il est possible de consulter toutes les transactions de stock, entrées ou sorties, à partir d'un produit du catalogue. Il vous est également possible de débiter ou créditer le stock à partir de cet endroit, manuellement ou par scan</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue4.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Chaque produit du catalogue est lié à un ou plusieurs fournisseurs grâce aux références fournisseurs. Elles sont utiles à la mémorisation des informations financières de chaque produit. Ces références fournisseurs sont également utilisées dans les commandes pour accélérer votre processus de commande et connaître le montant de votre commande avant envoi au fournisseur.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue5.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Il vous est possible de consulter l'historique détaillé de chaque opérations réalisées sur les produits de votre catalogue. Crédit, débit, changement d'informations, commandes, création, suppression...</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue6.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center">Pensez à attacher des fichiers, des documents à vos produits en stock. Notice, photos, garantie... Vous avez jusqu'à 5 emplacements disponibl</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue7.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center">Ajoutez facilement votre produit dans une des catégories créée préalablement.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between" >
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Catalogue8.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center">Rattachez rapidement votre produit à un fabricant. </div>
            </div>
        </div>


        <div class="tab-pane fade padding" id="pills-category" role="tabpanel" aria-labelledby="pills-category-tab">
            <h4 class="bold"><u>Catégories</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Categorie1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Créez autant de catégorie que nécessaire et ordonnez les en catégorie parente ou enfant.
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7 picture nopadding" src="assets/img/power28Categorie2.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Visualisez tous les produits présents dans une catégorie.<br/>
                    Vous pourrez également apercevoir leur disponibilité en stock grâce au voyant de couleur verte, orange ou rouge.<br/><br/>
                    Prenez connaissance du montant de votre stock par catégorie !
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Categorie3.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Visualisez tous les produits présents dans une catégorie.<br/>
                    Vous pourrez également apercevoir leur disponibilité en stock grâce au voyant de couleur verte, orange ou rouge.<br/><br/>
                    Prenez connaissance du montant de votre stock par catégorie !
                </div>
            </div>
        </div>
        <div class="tab-pane fade padding" id="pills-scan" role="tabpanel" aria-labelledby="pills-scan-tab">
            <h4 class="bold"><u>Scan</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Scan1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Débitez votre stock manuellement ou par scan de code-barre (type QR code) avec notre interface de gestion accélérée !<br/>
                    Les options FIFO* ou FEFO* sont disponibles dans Power28, pour une rotation de stock améliorée ! Cette interface est optimisé pour les volumes de scan importants et pour travailler très rapidement.  <br/><br/>
                    FIFO : First In First Out, Premier Entré Premier Sortit.<br/><br/>
                    FEFO : First Expired First Out, Premier Expiré Premier Sortit.
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Scan2.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Réalisez un inventaire COMPLET de votre stock en un temps record grâce à notre interface optimisée !
                    Sur un seul écran vous aurez accès à toutes les commandes utiles et facilitant la réalisation d'un inventaire complexe et volumineux.
                </div>
            </div>
        </div>
        <div class="tab-pane fade padding" id="pills-transaction" role="tabpanel" aria-labelledby="pills-transaction-tab">
            <h4 class="bold"><u>Transaction de Stocks</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Transaction1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Visualisez le détail d'une transaction de stock ainsi que toutes ses données financières.
                    C'est ici que vous apercevrez la granularité fine d'une gestion de stock optimisée !
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Transaction1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Chaque produit dans votre stock peut être rattaché à un lieu préalablement créé.
                </div>
            </div>
        </div>
        <div class="tab-pane fade padding" id="pills-manufacturers" role="tabpanel" aria-labelledby="pills-manufacturers-tab">
            <h4 class="bold"><u>Fabricants</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Fabricants1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Ajoutez tous les fabricants de vos produits en stock à votre base de donnée !
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Fabricants2.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Consultez tous les produits rattachés à un fabricant ainsi que leur disponibilité en stock.
                    Vous pourrez également connaître le montant du stock par fabricant.
                </div>
            </div>
        </div>
        <div class="tab-pane fade padding" id="pills-providers" role="tabpanel" aria-labelledby="pills-providers-tab">
            <h4 class="bold"><u>Fournisseurs</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Fournisseurs1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Ajoutez tous les fournisseurs de vos produits en stock à votre base de donnée !
                    Cela permet ensuite la création des références fournisseur.
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Fournisseurs2.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Visualisez toutes vos références fournisseur liées à vos produits directement à partir de votre liste de fournisseurs.
                </div>
            </div>
        </div>

        <div class="tab-pane fade padding" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">

            <h4 class="bold"><u>Commande</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Gérez vos commandes fournisseurs directement dans Power28. Composez votre bon de commande, prévoyez vos dépenses, anticipez et évitez une rupture de stock. Très facilement en quelques clics !</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande2.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Consultez le détail d'une commande que vous avez créé ou celles créées par vos collaborateurs.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande3.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Avec l'aide de notre assistant, composez votre commande fournisseur très facilement et visualisez directement le résultat. Vous pouvez, à partir de cet écran, ajouter vos produits à votre bon de commande en utilisant les références fournisseurs, elles seront utiles pour la maîtrise du coût de vos commandes ainsi que la valorisation de votre stock.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande4.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Consultez le détail de chaque produit ajouté à votre bon de commande.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande5.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Exportez votre bon de commande afin de le faire parvenir à votre fournisseur favori.<br/> Soit par récapitulatif total, contenant tous les produits de tous les fournisseurs.<br/>Soit par fournisseur, un fichier sera créé pour chaque fournisseur afin de n'envoyer que l'utile à chaque correspondant.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande6.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Une fois vos colis ou produits reçus, utilisez notre assistant afin de pointer la réception de vos produits en stock. Cet assistant pas à pas facilite le pointage en prenant en compte les variabilités de livraison, retards, livraison partielle, produits offerts, gestion des n° de lot et dates de péremption...</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande7.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Assistant de réception des commandes, en mode pas à pas, visuel n°1.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande8.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Assistant de réception des commandes, en mode pas à pas, visuel n°2.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande9.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Si un produit reçu ne correspond pas à vos attentes, n'hésitez pas à utiliser l'assistant de retour prévu dans le système de gestion des commandes.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande10.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Une fois vos produits reçus, imprimez toutes les étiquettes produit contenant les codes-barres (QR code) utiles à la gestion de stock.  Nous avons sélectionné une taille universelle pour faciliter l'impression de vos étiquettes produit.</div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Commande11.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Une fois vos produits reçus, imprimez toutes les étiquettes produit contenant les codes-barres (QR code) utiles à la gestion de stock.  Nous avons sélectionné une taille universelle pour faciliter l'impression de vos étiquettes produit.</div>
            </div>
        </div>

        <div class="tab-pane fade padding" id="pills-place" role="tabpanel" aria-labelledby="pills-place-tab">
            <h4 class="bold"><u>Lieu</u></h4><br/>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Lieu1.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Gérez vos lieux directement dans Power28 pour optimiser les emplacements de vos entrepôts.
                    Prenez connaissance de la valeur de votre stock par lieu et réalisez un tracking grâce aux étiquettes de lieu.
                </div>
            </div>
            <div class="row marginbottom shadow d-flex justify-content-between">
                <img class=" col-md-12 col-lg-7  picture nopadding" src="assets/img/power28Lieu2.png" alt="home">
                <div class="col-md-12 col-lg-5 descriptive d-flex align-items-center"> Ajoutez facilement tout ou partie des produits en stock aux lieux préalablement créés.
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>


</body>
</html>