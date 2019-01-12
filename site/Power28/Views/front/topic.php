<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/forum.css">
    <link rel="stylesheet" href="assets/css/topic.css">
    <title></title>
</head>
<body>
<?php require 'partials/header.php'; ?>


<div class="banner">
    <!-- si on affiche une catégorie, affichage de son nom, sinon affichage de "tous les articles" -->
    <h1 class="center"><?php if (isset($topic)): ?><?php echo $topic['categories']; ?><?php else : ?>Tous les topics<?php endif; ?>
        :</h1>
</div>

<div class="nopadding">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg_breadcrumb nomargin ">
            <li class="breadcrumb-item "><a class="titleBlack" href="index.php?page=forum">Accueil Forum</a></li>
            <li class="breadcrumb-item "><?php if (isset($topic)): ?><?php echo $topic['question']; ?></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="bg bg_white">
        <div class=" d-flex align-items-center justify-content-center nomargin">
            <div class="col-sm-12 col-xl-10 padding ">
                <h3 class=" nomargin center"><u> <?php echo $topic['question']; ?></u></h3><br/><br/>
                <div class="comment">
                    <?php if (isset($topic)): ?>
                    <div class="direction d-flex justify-content-between ">
                        <div class="col-sm-12 col-md-5">Par <?php echo htmlentities($topic['author']); ?></div>
                        <div class="col-sm-12 col-md-4"> Publié le <?php echo $topic['created_at']; ?> </div>
                    </div>
                <hr>
                    <b><u>Message :</u></b><br/><br/>
                    <p><?php echo $topic['content']; ?><?php endif; ?> </p>
                    <div class=" col-12 d-flex justify-content-end ">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="index.php?page=topic&topic_id=<?php echo $topic['id'] ?>#com">
                                <button class="btn blackButton"> RÉPONDRE</button>
                            </a>
                        <?php else: ?>
                            <a href="index.php?page=login-register">
                                <button class="btn blackButton"> CONNEXION</button>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <br/>

                <h2 class="center"><u> Commentaires :</u></h2><br/>
                <?php if (!empty($comments)): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <div class="direction d-flex justify-content-between">
                                <div class="col-sm-12 col-md-5">
                                    De <?php echo htmlentities($comment['author']); ?></div>
                                <div class="col-sm-12 col-md-5">
                                    Le <?php echo htmlentities($comment['created_at']); ?></div>
                            </div>
                            <hr>
                            <?php echo htmlentities($comment['comment']); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <?php if (isset($_SESSION['user'])): ?>
            <hr class="separation">
            <div class="d-flex align-items-center justify-content-center nomargin">

                <form action="index.php?page=topic&topic_id=<?php if (isset($topic)): ?><?php echo $topic['id'] ?><?php endif; ?>"
                      class=" col-sm-12 col-md-10 borderComments form  d-flex flex-column align-items-center"
                      method="post">
                    <h2 id="com" class="center"><u> Rédiger un commentaire :</u></h2>
                    <?php if (isset($commentMessage)): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $commentMessage; ?></div><?php endif; ?>

                    <div class="col-10 padding">
                        <label for="firstname"><u><h5>Pseudo :</h5></u></label>
                        <input class="form-control col-sm-6 col-md-4 " value="<?php echo $user['pseudo']; ?>"
                               type="text" placeholder="Prénom" name="firstname" id="firstname"/>
                    </div>
                    <div class="col-10 nopadding">
                        <label for="comment" class=""><u><h5>Commentaire :</h5></u></label>
                        <textarea class="form-control" name="comment" id="comment" placeholder="Commentaire"></textarea>
                    </div>
                    <br/>
                    <div class=" col-10 d-flex justify-content-end ">
                        <input class="btn blackButton" type="submit" name="sendComment" value="ENVOYER"/>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <h2 class="center"><u>Rédiger un commentaire :</u></h2>
            <div class="d-flex align-items-center justify-content-center nomargin ">
                <div class="col-10 bg_grey borderComments padding">
                    <h4 class="center"> Veuillez vous connecter pour pouvoir rédiger un commentaire</h4> <br/>
                    <div class=" col-11 d-flex justify-content-end ">
                        <a href="index.php?page=login-register">
                            <button class="btn blackButton"> CONNEXION</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require 'partials/footer.php'; ?>

</body>
</html>