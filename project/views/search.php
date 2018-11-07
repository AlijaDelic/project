<?php
include "../views/nav/nav.php";
include "../helpers/ClassLoader.php";
if (isset($_POST) && sizeof($_POST) > 0) {
    $search_for = $_POST['search'];
    $search = Articles::getData("ingridians.name, recipes.title, recipes.recipe_id, recipes.subtitle, recipes.image, recipes.content, articles.amount", "WHERE ingridians.name LIKE '$search_for%' OR recipes.title LIKE '$search_for%' GROUP BY recipe_id ");
    if (sizeof($search) > 0) {
        ?>
        <div class="container-fluid text-center">
            <h1>Resultati pretrage:</h1>
            <hr>
        </div>
        <?php
        foreach ($search as $s) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img src="../views/images/<?= $s['image'] ?>" alt="<?= $s['title'] ?>"
                             class="card-img img-thumbnail">
                    </div>
                    <div class="col-8">
                        <h4><a class=" align-middle"
                               href="articles.php?id=<?= $s['recipe_id'] ?>"><?= $s['title'] ?></a></h4>
                        <p><?= $s['subtitle'] ?></p>
                            <a href="articles.php?id=<?= $s['recipe_id'] ?>" class="btn btn-md btn-success">Citaj clanak</a>
                    </div>
                </div>
                <hr>
            </div>

            <?php
        }
    }else{
        ?>
        <div class="container-fluid text-center mt-5">
            <h1>Nema rezultata za prikaz!</h1>
            <hr>
        </div>
<?php
    }
}

