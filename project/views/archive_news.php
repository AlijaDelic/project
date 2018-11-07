<?php
include "../helpers/ClassLoader.php";
$articles = Articles::getData("recipes.recipe_id, recipes.title, recipes.subtitle, recipes.image", "group by recipe_id desc limit 15");
?>
<div class="container">
    <div class="row jumbotron">
        <?php
        foreach ($articles as $article) {
            ?>
            <div class="col-lg-4 mol-md-4 col-sm-6">
                <ul class="list-group archive">
                    <li class="list-group-item"><a href="articles.php?id=<?=$article['recipe_id']?>"><?=$article['title']?></a></li>
            </div>
            <?php
        }
        ?>
    </div>
</div>