<!DOCTYPE html>
<html>
<head>
    <title>Administration des commentaires</title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">
    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-12 paddingAdmin">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des commentaires du forum</h4>
                <a class="btn blackButton" href="index.php?admin=commentForm">Ajouter un topic</a>
            </header>

            <?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if($comments): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Auteur</th>
                    <th>Crée le</th>
                    <th>Publié?</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($comments as $comment): ?>
                    <tr>
                        <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                        <th><?php echo htmlentities($comment['id']); ?></th>
                        <td><?php echo htmlentities($comment['author']); ?></td>
                        <td><?php echo htmlentities($comment['created_at']); ?></td>
                        <td><?php echo htmlentities($comment['is_published']); ?></td>
                        <td>
                            <a href="index.php?admin=commentForm&comment_id=<?php echo $comment['id']; ?>&action=edit" class="btn greyButton">Modifier</a>
                            <a onclick="return confirm('Êtes-vous sûre?')" href="index.php?admin=comment&comment_id=<?php echo $comment['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php else: ?>
                    Aucun commentaire enregistré.
                <?php endif; ?>

                </tbody>
            </table>

        </section>

    </div>

</div>
<?php require 'partials/footer.php'; ?>
</body>
</html>