<h3 class="center padding"><u><b> Sélectionner une catégorie</b> </u></h3>
<div class="row margin d-flex justify-content-around">
    <?php foreach ($categoriesForum as $category): ?>
        <div class="col-sm-6 col-lg-4 ">
            <a href="index.php?page=topic_list&category_id=<?php echo $category['id']; ?>#scroll">
                <button id="bg_image" class="d-flex justify-content-center"
                        style="background-image:url('assets/img/forum/<?php echo $category['image']; ?>')">

                    <div class="whiteCard d-flex align-items-center justify-content-center">
                        <h4 class="titleBlack nomargin"><?php echo htmlentities($category['name_category']); ?></h4>
                    </div>
                </button>
            </a>
        </div>
    <?php endforeach; ?>
</div>
