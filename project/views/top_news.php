<?php
include "../helpers/ClassLoader.php";
$articles = Articles::getData("recipes.recipe_id, recipes.title, recipes.subtitle, recipes.image", "group by recipe_id desc limit 6");
?>
<div class="container-fluid">

    <div class="row">
        <?php
        foreach ($articles as $article) {
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6 positioning">
                <img src="images/<?=$article['image']?>" alt="<?=$article['image']?>" class="card-img ">
                <div class="card-img-overlay ovl">
                    <h3><?=$article['title']?></h3>
                    <p><?=$article['subtitle']?></p>
                    <a href="articles.php?id<?=$article['recipe_id']?>" class="btn btn-outline-success ">Citaj vise</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
