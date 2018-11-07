<?php
include "../helpers/ClassLoader.php";
$articles = Articles::getData("recipes.recipe_id, recipes.title, recipes.subtitle, recipes.image, categories.category_name", "WHERE category_name LIKE '$page' GROUP BY recipe_id LIMIT 8");

?>
<div class="container-fluid mb-2">
    <div class="row">
        <?php
        foreach ($articles as $article) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <img src="images/<?=$article['image']?>" alt="<?=$article['title']?>" class="card-img ">
                <div class="card-img-overlay ovl">
                    <a href="articles.php?id=<?=$article['recipe_id']?>">
                        <h3><?=$article['title']?></h3>
                        <p><?=$article['subtitle']?></p>
                    </a>
                    <a href="articles.php?id=<?=$article['recipe_id']?>" class="btn btn-outline-success ">Citaj vise</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>