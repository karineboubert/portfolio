<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/price.css">
    <title>Récapitulatif d'achat</title>
</head>
<body>
<?php require 'partials/header.php'; ?>

    <div class="banner d-flex align-items-center justify-content-center">
        <h3>Récapitulatif d'achat</h3>
    </div>

    <section class=" mt-5 mb-5 container padding">
        <table class="mt-3 mb-5  table table-striped ">
            <thead>
            <tr>
                <th>Libellé</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Logiciel Power28</th>
                <td><?php echo $purchase['price_power28'] ?>€</td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <th>Hébergement FilesMaker</th>
                <td><?php echo $purchase['price_filesMaker'] ?>€</td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <th>Formation</th>
                <td><?php echo $purchase['price_training'] ?>€</td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end align-items-end flex-column ">
            <h4>Total HT
                : <?php echo $totalprice = $purchase['price_power28'] + $purchase['price_filesMaker'] + $purchase['price_training'] ?>
                €</h4>
            <h3>Total TTC : <?php echo $totalprice + ($totalprice / 100) * 20 ?>€</h3>
        </div>
    </section>
<?php require 'partials/footer.php'; ?>
</body>
</html>
