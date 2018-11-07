<!--Navigation-->
<?php
include "../helpers/ClassLoader.php";
if (isset($_GET['delete'])) {
    var_dump($_GET['delete']);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $articles = Articles::getData("*", "WHERE recipes.recipe_id = '$id'");
    $article_title = Articles::getData("recipes.title", "WHERE recipes.recipe_id = '$id' LIMIT 1");
    $article_subtitle = Articles::getData("recipes.subtitle", "WHERE recipes.recipe_id = '$id' LIMIT 1");
    $article_image = Articles::getData("recipes.image", "WHERE recipes.recipe_id = '$id' LIMIT 1");
    $article_content = Articles::getData("recipes.content", "WHERE recipes.recipe_id = '$id' LIMIT 1");
    $article_ingridians = Articles::getData("ingridians.name", "WHERE recipes.recipe_id = '$id'");
    $article_ingridians_amount = Articles::getData("amount", "WHERE recipes.recipe_id = '$id'");
    $article_id = Articles::getData("recipes.recipe_id", "GROUP BY recipe_id");
    $next_id = Articles::getData("recipes.recipe_id", "WHERE recipes.recipe_id > '$id' LIMIT 1");
    $previous_id = Articles::getData("recipes.recipe_id", "WHERE recipes.recipe_id < '$id' order by recipe_id desc LIMIT 1");
    $article_author = Articles::getData("users.username", "GROUP BY users.username LIMIT 1");
    $article_date = Articles::getData("recipes.recipe_id, recipes.date", "GROUP BY recipe_id");
    $all_ids = array();
    $dt = new DateTime($article_date[0]['date']);
    for ($i = 0; $i < sizeof($article_id); $i++) {
        $ids = $article_id[$i]['recipe_id'];
        array_push($all_ids, $ids);
    }
    if (!in_array($id, $all_ids)) {
        $next = $next_id[0]['recipe_id'];
        return header("location: ../views/articles.php?id=$next");
    }
    include "../views/nav/nav.php";
    ?>

    <!-- content -->
    <div style="font-family: 'Open Sans Condensed', sans-serif" class="container-fluid ">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h1><?= $article_title[0]['title'] ?></h1>
            </div>
            <div class="col-12 mt-5 text-center">
                <img src="images/<?= $article_image[0]['image'] ?>" alt="<?= $article_title[0]['title'] ?>"
                     class="img-fluid img-thumbnail">
            </div>
            <div class="col-12 mt-5 text-center mt-4">
                <h3><?= $article_subtitle[0]['subtitle'] ?></h3>
            </div>
            <div class="col-12 mt-5 text-center">
                <hr>
            </div>
        </div>
        <div class="container jumbotron">
            <div class="row">
                <div id="sastojci" class="col-12 col-sm-12 col-md-4 col-lg-4 mt-5 text-center jumbotron">
                    <ul>
                        <h3>Sastojci:</h3>
                        <?php
                        for ($i = 0; $i < sizeof($article_ingridians); $i++) {
                            echo "<li class='mt-2'>" . $article_ingridians_amount[$i]['amount'] . " - " . $article_ingridians[$i]['name'] . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div id="priprema" class="col-12 col-sm-12 col-md-8 col-lg-8 mt-5 jumbotron text-center">
                    <?php
                    echo $article_content[0]['content'];
                    ?>
                </div>
            </div>

            <div class="row alert-info jumbotron m-0">
                <div class="col-2 mr-auto ">Autor: <?= $article_author[0]["username"] ?></div>
                <div class="col-2 ml-auto "><p>Datum objave: <?= $dt->format('d.M.Y') ?></p></div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        if (sizeof($previous_id) > 0) {
                            ?>
                            <li class="page-item mr-auto"><a class="page-link"
                                                             href="articles.php?id=<?= $previous_id[0]['recipe_id'] ?>">Previous</a>
                            </li>
                            <?php
                        } else {
                            echo "<li class='page-item mr-auto'><a class='page-link disabled'>Previous</a></li>";
                        }
                        if (sizeof($next_id) > 0) {
                            ?>
                            <li class="page-item ml-auto"><a class="page-link"
                                                             href="articles.php?id=<?= $next_id[0]['recipe_id'] ?>">Next</a>
                            </li>
                            <?php
                        } else {
                            echo "<li class='page-item ml-auto'><a class='page-link disabled'>Next</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- comment -->

    <?php
    include "../views/comments.php";
    ?>
    <!-- footer -->
    <?php
    include "../views/nav/footer.php";
}