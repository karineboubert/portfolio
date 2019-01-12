<!DOCTYPE html>
<html>
<head>
    <title>Administration des catégories</title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">
    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-12 paddingAdmin">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des catégories de la FAQ</h4>
                <a class="btn blackButton" href="index.php?admin=categoryFaqForm">Ajouter une catégorie</a>
            </header>

            <?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if($categoriesFaq): ?>
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Nom</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($categoriesFaq as $categoryFaq): ?>
                        <tr>
                            <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                            <th><?php echo htmlentities($categoryFaq['id']); ?></th>
                            <td><?php echo htmlentities($categoryFaq['name_category']); ?></td>
                            <td>
                                <a href="index.php?admin=categoryFaqForm&categoryFaq_id=<?php echo $categoryFaq['id']; ?>&action=edit" class="btn greyButton">Modifier</a>
                                <a onclick="return confirm('Êtes-vous sûre?')" href="index.php?admin=categoryFaq&categoryFaq_id=<?php echo $categoryFaq['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>
                    Aucune catégorie enregistrés.
                <?php endif; ?>

                </tbody>
            </table>

        </section>

    </div>

</div>
<?php require 'partials/footer.php'; ?>
</body>
</html>
