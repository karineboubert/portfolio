<!DOCTYPE html>
<html>
<head>

    <title>Administration des catégories du forum</title>

    <?php require 'partials/head_assets.php'; ?>

</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">
    <section class="col-12 paddingAdmin">
        <header class="pb-3">
            <!-- Si $category existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
            <h4><?php if (isset($categoryForum)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une catégorie</h4>
        </header>

        <?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
            <div class="bg-danger text-white">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Si $category existe, chaque champ du formulaire sera pré-remplit avec les informations de la catégorie -->

        <form action="index.php?admin=categoryForumForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name_category">Nom :</label>
                <input class="form-control" <?php if (isset($categoryForum)): ?>value="<?php echo htmlentities($categoryForum['name_category']); ?>"<?php endif; ?> type="text" placeholder="Nom" name="name_category" id="name_category"/>
            </div>

            <div class="form-group">
                <label for="image">Image :</label>
                <input class="form-control" type="file" name="image" id="image"/>
                <?php if (isset($categoryForum) && $categoryForum['image']): ?>
                    <img class="img-fluid py-4" src="assets/img/forum/<?php echo $categoryForum['image']; ?>" alt=""/>
                    <input type="hidden" name="image" value="<?php echo $categoryForum['image']; ?>"/>
                <?php endif; ?>
            </div>


            <div class="text-right">
                <!-- Si $category existe, on affiche un lien de mise à jour -->
                <?php if (isset($categoryForum)): ?>
                    <input class="btn greyButton" type="submit" name="update" value="Mettre à jour"/>
                    <!-- Sinon on afficher un lien d'enregistrement d'une nouvelle catégorie -->
                <?php else: ?>
                    <input class="btn blackButton" type="submit" name="save" value="Enregistrer"/>
                <?php endif; ?>
            </div>

            <!-- Si $category existe, on ajoute un champ caché contenant l'id de la catégorie à modifier pour la requête UPDATE -->
            <?php if (isset($categoryForum)): ?>
                <input type="hidden" name="id" value="<?php echo $categoryForum['id'] ?>"/>
            <?php endif; ?>
        </form>
    </section>

</div>
</body>
</html>
