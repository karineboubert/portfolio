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
                <h4>Liste des topics du Forum</h4>
                <a class="btn blackButton" href="index.php?admin=topicForm">Ajouter un topic</a>
            </header>

            <?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if($topics): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Auteur</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($topics as $topic): ?>
                    <tr>
                        <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                        <th><?php echo htmlentities($topic['id']); ?></th>
                        <td><?php echo htmlentities($topic['question']); ?></td>
                        <td><?php echo htmlentities($topic['author']); ?></td>
                        <td>
                            <a href="index.php?admin=topicForm&topic_id=<?php echo $topic['id']; ?>&action=edit" class="btn greyButton">Modifier</a>
                            <a onclick="return confirm('Êtes-vous sûre?')" href="index.php?admin=topic&topic_id=<?php echo $topic['id']; ?>&action=delete" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php else: ?>
                    Aucun topic enregistré.
                <?php endif; ?>

                </tbody>
            </table>

        </section>

    </div>

</div>
<?php require 'partials/footer.php'; ?>
</body>
</html>