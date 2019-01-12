<!DOCTYPE html>
<html>
<head>

    <title>Administration des topics du Forum</title>

    <?php require 'partials/head_assets.php'; ?>

</head>
    <body class="index-body">
    <?php require 'partials/header.php'; ?>
    <div class="container-fluid">
        <section class="col-12 paddingAdmin">
            <header class="pb-3">
                <!-- Si $category existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                <h4><?php if (isset($topic)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un topic</h4>
            </header>

            <?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
                <div class="bg-danger text-white">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="index.php?admin=topicForm" method="post">

                <div class="form-group">
                    <label for="question">Question :</label>
                    <textarea class="form-control" name="question"
                              id="question"><?php if (isset($topic)): ?><?php echo htmlentities($topic['question']) ?><?php endif; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Contenu:</label>
                    <textarea class="form-control" name="content"
                              id="content"><?php if (isset($topic)): ?><?php echo htmlentities($topic['content']) ?><?php endif; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="author">Auteur:</label>
                    <input class="form-control"
                           <?php if (isset($topic)): ?>value="<?php echo htmlentities($topic['author']); ?>"<?php endif; ?>
                           type="text" placeholder="Auteur" name="author" id="author"/>
                </div>

                <div class="form-group">
                    <label for="is_published"> Publié ?</label>
                    <select class="form-control" name="is_published" id="is_published">
                        <option value="0"
                                <?php if (isset($topic) && $topic['is_published'] == 0): ?>selected<?php endif; ?>>Non
                        </option>
                        <option value="1"
                                <?php if (isset($topic) && $topic['is_published'] == 1): ?>selected<?php endif; ?>>Oui
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="categories"> Catégories du forum </label>
                    <select class="form-control" name="categories[]" id="categories" multiple="multiple">
                        <?php
                        $queryCategory = $db->query('SELECT * FROM category_forum');
                        $categories = $queryCategory->fetchAll();
                        ?>
                        <?php foreach ($categories as $key => $category) : ?>

                            <?php
                            $selected = '';

                            foreach ($topicCategories as $topicCategory) {
                                if ($category['id'] == $topicCategory['category_id']) {
                                    $selected = 'selected="selected"';
                                }
                            }
                            ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>> <?php echo $category['name_category']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="text-right">
                    <?php if (isset($topic)): ?>
                        <input class="btn greyButton" type="submit" name="update" value="Mettre à jour"/>
                    <?php else: ?>
                        <input class="btn blackButton" type="submit" name="save" value="Enregistrer"/>
                    <?php endif; ?>
                </div>

                <?php if (isset($topic)): ?>
                    <input type="hidden" name="id" value="<?php echo $topic['id'] ?>"/>
                <?php endif; ?>
            </form>
        </section>
    </div>
    </body>
</html>