<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/forum.css">
    <title>Power28</title>
</head>
<body>
<?php require 'partials/header.php'; ?>

    <div class="banner">
        <!-- si on affiche une catégorie, affichage de son nom, sinon affichage de "tous les articles" -->
        <h1><?php if(isset($currentCategory)): ?><?php echo $currentCategory['name_category']; ?><?php else : ?>Tous les topics<?php endif; ?> :</h1>
    </div>


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg_breadcrumb ">
            <li class="breadcrumb-item "><a class="titleBlack" href="index.php?page=forum">Accueil Forum</a></li>
            <?php if(!empty($currentCategory)): ?>
                <li class="breadcrumb-item"><a class="titleBlack" href="index.php?page=topic_list"> Tous les topics</a></li>
            <?php endif ?>
        </ol>
    </nav>

    <div class="col-lg-12 nomargin d-flex justify-content-end">
        <?php if(isset($_SESSION['user'])): ?>
            <p class="d-flex justify-content-end">
                <a class="blackButton bold" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Créer un nouveau topic
                </a>
            </p>
    </div>
    <div class="collapse" id="collapseExample">
        <div class=" card-body nopadding">
            <div class="column">
                <p class="text  ">
                <div class=" banner d-flex align-items-center justify-content-center">
                    <h3>Créer un nouveau topic</h3>
                </div>
                <?php if (isset($addTopicMessage)): //si un message a été généré plus haut, l'afficher ?>
                    <div class="bg-danger text-white">
                        <?php echo $addTopicMessage; ?>
                    </div>
                <?php endif; ?>

                <form action="index.php?page=topic_list" method="post" class="pt-5 offset-1 col-10">
                    <div class="form-group">
                        <label for="question">Question :</label>
                        <textarea class="form-control" name="question" id="question"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu:</label>
                        <textarea class="form-control" name="content" id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Auteur:</label>
                        <input class="form-control" type="text" value="<?php echo $user['pseudo']; ?>" placeholder="Auteur" name="author"
                               id="author"/>
                    </div>

                    <div class="form-group">
                        <label for="categories"> Catégories du forum </label>
                        <select class="form-control" name="categories[]" id="categories" multiple="multiple">
                            <?php
                            $queryCategory = $db->query('SELECT * FROM kp28_category_forum');
                            $categories = $queryCategory->fetchAll();
                            ?>
                            <?php foreach ($categories as $key => $category) : ?>

                                <?php $selected = '';
                                foreach ($topicCategories as $topicCategory) {
                                    if ($category['id'] == $topicCategory['category_id']) {$selected = 'selected="selected"';}
                                }
                                ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>> <?php echo $category['name_category']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-right">
                        <input class="btn blackButton" type="submit" name="sendTopic" value="Créer"/>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 nomargin d-flex justify-content-end">
        <?php else: ?>
            <a href="index.php?page=login-register"> <button class="btn blackButton"> CONNEXION</button></a>
        <?php endif;?>
    </div>


    <?php require 'partials/navForum.php'; ?><br/>
    <div id="scroll"></div>
    <div id="deleteMobile">
        <div class="row banner nomargin d-flex align-items-center">
            <div class="col-md-0 col-lg-3"></div>
            <div class="col-md-4 col-lg-3">
                <h5>Question</h5>
            </div>
            <div class="col-md-2 col-lg-2">
                <h5>Auteur</h5>
            </div>
            <div class="col-md-2 col-lg-1 ">
                <h5>Date de création</h5>
            </div>
            <div class="col-md-4 col-lg-3">
            </div>
        </div>
    </div>

    <?php if(!empty($topics)): ?>
    <div class="topic">
        <?php foreach ($topics as $topic): ?>
            <div class="row topic borderBlack padding d-flex align-items-center nomargin ">

                <div class="col-md-0 col-lg-3 ">
                    <div id="bg_image" style="background-image:url('assets/img/forum/<?php echo $topic['image']; ?>')" >
                        <div class="whiteCardCategory d-flex align-items-center justify-content-center">
                            <h4 class="titleBlack nomargin"><?php echo htmlentities($topic['name_category']); ?></h4>
                        </div>
                    </div>
                </div>
                <h6 class="col-md-4 col-lg-3 nomargin"> <?php echo htmlentities($topic['question']);?></h6>
                <p class=" col-md-2 col-lg-2 nomargin"> <?php echo htmlentities($topic['author']);?></p>
                <p class="col-md-2 col-lg-1 nomargin"> <?php echo $topic['created_at'];?>  </p>
                <div class="col-md-4 col-lg-3 nomargin d-flex justify-content-center">
                    <a class="blackButton bold" href="index.php?page=topic&topic_id=<?php echo $topic['id']; ?>"> Voir la discussion </a>
                </div>

            </div>
        <?php endforeach; ?>
        <div id="newTopic"></div>
    </div>
    <?php else: ?>
        <!-- s'il n'y a pas d'articles à afficher (catégorie vide ou aucun article publié) -->
        <h6 class=" padding center"> Aucun topic dans cette catégorie...</h6>
    <?php endif; ?><br/>

<?php require 'partials/footer.php'; ?>
</body>
</html>

