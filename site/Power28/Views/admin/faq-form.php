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
                <h4><?php if(isset($faq)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un topic</h4>
            </header>

            <?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
                <div class="bg-danger text-white">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="index.php?admin=topicForm" method="post">
                <div class="form-group">
                    <label for="question">Question :</label>
                    <textarea class="form-control"  name="question" id="question"><?php if(isset($faq)): ?><?php echo htmlentities($faq['question'])?><?php endif; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="answer">Réponse:</label>
                    <textarea class="form-control"  name="answer" id="answer"><?php if(isset($faq)): ?><?php echo htmlentities($faq['answer'])?><?php endif; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="category_id"> Catégorie </label>
                    <select class="form-control" name="category_id" id="category_id">
                        <?php
                        $queryCategory= $db ->query('SELECT * FROM category_faq');
                        while($category_faq = $queryCategory->fetch()):
                            ?>
                            <option value="<?php echo $category_faq['id']; ?>" <?php if(isset($faq) && $faq['category_id'] == $category_faq['id']): ?>selected<?php endif; ?>> <?php echo $category_faq['name_category']; ?> </option>

                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="is_published"> Publié ?</label>
                    <select class="form-control" name="is_published" id="is_published">
                        <option value="0" <?php if(isset($faq) && $faq['is_published'] == 0): ?>selected<?php endif; ?>>Non</option>
                        <option value="1" <?php if(isset($faq) && $faq['is_published'] == 1): ?>selected<?php endif; ?>>Oui</option>
                    </select>
                </div>

                <div class="text-right">
                    <?php if(isset($faq)): ?>
                        <input class="btn greyButton" type="submit" name="update" value="Mettre à jour" />
                    <?php else: ?>
                        <input class="btn blackButton" type="submit" name="save" value="Enregistrer" />
                    <?php endif; ?>
                </div>

                <?php if(isset($faq)): ?>
                    <input type="hidden" name="id" value="<?php echo $faq['id']?>" />
                <?php endif; ?>
            </form>
        </section>
</div>
</body>
</html>