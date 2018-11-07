<?php
include "../helpers/ClassLoader.php";
$articles = Articles::getData("recipes.recipe_id, recipes.title, recipes.subtitle, recipes.image", "group by recipe_id desc limit 3");
?>
<div class="container">
    <div id="Latest_news" class="row">
        <div class="col-12 col-lg-4 col-md-12 col-sm-12  jumbotron">
            <!-- Small slider for showing latest news -->
            <div id="carousel2" class="carousel slide" data-ride="carousel" data-interval="8000">

                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-100 img-thumbnail"
                             src="images/kolac-sa-makom.jpg?auto=yes&text=First slide" alt="First slide">
                        <h3>Kolac sa makom</h3>
                        <p>Najbolji kolac sa makom</p>
                        <a href="pita-sa-makom.html" class="btn btn-outline-danger">Procitaj vise</a>
                    </div>

                    <?php
                    for ($i = 0; $i < sizeof($articles); $i++) {
                        ?>
                        <div class="carousel-item ">
                            <img class="d-block w-100 img-thumbnail"
                                 src="images/<?= $articles[$i]['image'] ?>?auto=yes&text=<?= $articles[$i]['image'] ?>"
                                 alt="<?= $articles[$i]['image'] ?>">
                            <h5><?= $articles[$i]['title'] ?></h5>
                            <p><?= $articles[$i]['subtitle'] ?></p>
                            <a href="articles.php?id=<?= $articles[$i]['recipe_id'] ?>" class="btn btn-outline-danger">Procitaj
                                vise</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 col-sm-12 jumbotron ">
            <?php
            $articles4 = Articles::getData("recipes.recipe_id, recipes.title, recipes.subtitle, recipes.image", "group by recipe_id desc LIMIT 4");
            foreach ($articles4 as $article) {
                ?>
                <div class="jumbotron jumbotron-sm bg-white">
                    <img src="images/<?=$article['image']?>" alt="<?=$article['image']?>" class="rounded float-left mr-2" width="100">
                    <h4><a href="articles.php?id=<?=$article['recipe_id']?>"><?=$article['title']?></a></h4>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- List of latest news-->
        <div id="jumbo-left" class="col-12 col-lg-4 col-md-6 col-sm-12 jumbotron">
            <div class="list-group">
                <?php
                $articles10 = Articles::getData("recipes.recipe_id, recipes.title, recipes.subtitle, recipes.image", "group by recipe_id desc LIMIT 10");
                foreach ($articles10 as $article) {
                    ?>
                    <a href="articles.php?id=<?=$article['recipe_id']?>" class="list-group-item list-group-item-action"><?=$article['title']?></a>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>