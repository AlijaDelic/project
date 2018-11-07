<?php
include "../views/nav/nav.php";
include "../helpers/ClassLoader.php";
include "../views/nav/admin_navigation.php";
include "../views/nav/dodaj_clanak_nav.php";
if ($user[1] == 1) {
    if (isset($_GET['id'])){
        $delete = Articles::deleteData();
        echo "<div class='container jumbotron alert-success'>Uspjesno ste obrisali recept</div>";
    }
    $datas = Articles::getData('recipes.title, recipes.recipe_id', "group by title");
    ?>
    <div class="container">

    <div class="row mt-5">
    <div class="col text-center">
    <div class="jumbotron">
    <form class="form-group" action="?id" method="get">
        <label for="recipe">Izaberite clanak za brisanje</label>
        <select class="form-control text-center mt-3" name="id">
            <option selected> Izaberite clanak za brisanje</option>
            <?php
            foreach ($datas as $d => $data) {
                ?>
                <option class='form-control text-center' value="<?= $data['recipe_id'] ?>">
                    <?= $data['title'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="submit" class="btn btn-lg btn-danger mt-3" value="Obrisi">
    </form>
    <?php
}