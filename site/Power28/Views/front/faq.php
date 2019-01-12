<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'partials/head_assets.php'; ?>
    <link rel="stylesheet" href="assets/css/faq.css">
    <title>FAQ</title>
</head>
</body>
    <?php require 'partials/header.php'; ?>

    <div class=" banner d-flex align-items-center justify-content-center">
        <h3>Foire aux questions</h3>
    </div>

    <?php foreach($categories as $category): ?>
    <div class="category">
        <h3 class="nomargin"><?php echo $category['name_category']?> </h3>
    </div>

    <?php foreach($questions as $question): ?>
       <?php if($category['id'] == $question['category_id']): ?>
    <div class="container">
        <div id="accordion" class="margin" role="tablist">
            <h5 class="mb-1" >
                <a data-toggle="collapse"  href="#collapse<?php echo $question['id'];?>" aria-expanded="false">
                    <?php echo $question['question']?>
                </a>
            </h5>

            <div id="collapse<?php echo $question['id'];?>" class="collapse"  aria-labelledby="headingOne">
                <div class="card-answer paddingAnswer">
                    <?php echo $question['answer']?>
                </div>
            </div>
        </div>
    </div><?php endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>

    <?php require 'partials/footer.php'; ?>
<body>
</html>