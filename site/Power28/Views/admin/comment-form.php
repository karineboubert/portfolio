<!DOCTYPE html>
<html>
<head>

    <title>Administration des commentaires du Forum</title>

    <?php require 'partials/head_assets.php'; ?>

</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">
    <section class="col-12 paddingAdmin">
        <header class="pb-3">
            <!-- Si $category existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
            <h4><?php if (isset($comment)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un topic</h4>
        </header>

        <?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
            <div class="bg-danger text-white">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?admin=commentForm" method="post">
            <div class="form-group">
                <label for="topic_id"> Topic </label>
                <select class="form-control" name="topic_id" id="topic_id">
                    <?php
                    $queryTopic = $db->query('SELECT * FROM topic');
                    while ($topic = $queryTopic->fetch()):?>
                        <option value="<?php echo $topic['id']; ?>"
                                <?php if (isset($comment) && $comment['topic_id'] == $topic['id']): ?>selected<?php endif; ?>> <?php echo $topic['question']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="user_id"> Utilisateur </label>
                <select class="form-control" name="user_id" id="user_id">
                    <?php
                    $queryUser = $db->query('SELECT * FROM user');
                    while ($user = $queryUser->fetch()):
                        ?>
                        <option value="<?php echo $user['id']; ?>"
                                <?php if (isset($comment) && $comment['user_id'] == $user['id']): ?>selected<?php endif; ?>> <?php echo $user['pseudo']; ?> </option>

                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Commentaire :</label>
                <textarea class="form-control" name="comment" id="comment"><?php if (isset($comment)): ?><?php echo htmlentities($comment['comment']) ?><?php endif; ?></textarea>
            </div>

            <div class="form-group">
                <label for="author">Auteur: </label>
                <input class="form-control" <?php if (isset($comment)): ?>value="<?php echo htmlentities($comment['author']) ?>"<?php endif; ?> type="text" placeholder="Auteur" name="author" id="author"/>
            </div>

            <div class="form-group">
                <label for="is_published"> Publié ?</label>
                <select class="form-control" name="is_published" id="is_published">
                    <option value="0"
                            <?php if (isset($comment) && $comment['is_published'] == 0): ?>selected<?php endif; ?>>Non
                    </option>
                    <option value="1"
                            <?php if (isset($comment) && $comment['is_published'] == 1): ?>selected<?php endif; ?>>Oui
                    </option>
                </select>
            </div>

            <div class="text-right">

                <?php if (isset($comment)): ?>
                    <input class="btn greyButton" type="submit" name="update" value="Mettre à jour"/>

                <?php else: ?>
                    <input class="btn blackButton" type="submit" name="save" value="Enregistrer"/>
                <?php endif; ?>
            </div>

            <?php if (isset($comment)): ?>
                <input type="hidden" name="id" value="<?php echo $comment['id'] ?>"/>
            <?php endif; ?>
        </form>
    </section>

</div>
<?php require 'partials/footer.php'; ?>
</body>
</html>