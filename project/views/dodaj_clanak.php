<?php
include "../views/nav/nav.php";
include "../helpers/ClassLoader.php";
include "../views/nav/admin_navigation.php";
include "../views/nav/dodaj_clanak_nav.php";
$user = User::getLoggedInUser();
$categories = Categories::getData("category_name");
if ($user[1] == 1) {
    if (isset($_POST) && sizeof($_POST) > 0)
    {
        $article = Articles::save();
        if ($article === true)
        {
            echo "<div class='alert-success jumbotron text-center mt-10'><h1>Dodali ste clanak! <br> Sve clanke mozete vidjeti <a href ='../views/administration.php?type=clanci'>ovde</a>!</h1></div>";
            return;
        }
        else
        {
            foreach ($article as $error)
            {
                echo "<div class='alert-danger jumbotron text-center mt-10'>$error</div>";
            }
        }
    }


    ?>
    <div class="container mt-4">
    <h4>Za dodavanje clanka popunite sva polja</h4>
    <form enctype="multipart/form-data" action="" method="POST">
        <div class="form-group">
            <label for="title">Naslov:</label>
            <input type="text" class="form-control" name="title" id="title">
            <label for="subtitle">Podnaslov:</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control">
            <select class="custom-select mt-4 text-center" id="category" name="category">
                <option selected>Izaberite kategoriju</option>
                <?php

                foreach ($categories as $category) {
                    echo "<option value=" . $category . ">" . $category . "</option>";
                }
                ?>
            </select>
            <label>Slika:</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="customFile">Ubacite sliku</label>
            </div>
            <label for="content">Opis postupka:</label>
            <textarea class="form-control" name="content" id="editor"></textarea>
        </div>
        <table class="table mt-3 text-center" id="table-1">
            <tr>
                <th colspan="3">Ovdje mozete vidjeti sastojke koji su vec u bazi.</th>
            </tr>
            <tr>
                <td>
                    <select class="form-control" name="ingridian" id="choosed_ingridian_name">
                        <option selected>Izaberite sastojak</option>
                        <?php
                        $ingridans = Ingridians::get_data("name");
                        for ($y = 0; $y < sizeof($ingridans); $y++) {
                            ?>
                            <option class="form-control ingridians"
                            "> <?php echo $ingridans[$y] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td><input type="text" class="form-control" id="choosed_ingridian_amount"></td>
                <td>
                    <div class="btn btn-outline-primary" id="choosed_ingridian_button">Dodaj sastojak</div>
                </td>
            </tr>
            <tr>
                <td id="alert-msg" colspan="3"></td>
            </tr>
        </table>
        <table class="table text-center" id="table-2">
            <div class="form-group">
                <tr>
                    <th colspan="3">Ukoliko vas sastojak ne postoji unesite ga ovde!!</th>
                </tr>
                <tr>
                    <th>Sastojak:</th>
                    <th>Kolicina:</th>
                </tr>
                <tr>
                    <td id="alert-msg-1" colspan="3"></td>
                </tr>
                <div id="load_more_fileds">
                    <tr>
                        <td><input type="text" id="add_new_ingridian" class="form-control"
                                   placeholder="sastojak"></td>
                        <td><input type="text" id="add_new_ingridian_amount" class="form-control"
                                   placeholder="kolicina"></td>
                        <td>
                            <div class="btn btn-outline-primary" id="add_new_button">Dodaj novi sastojak</div>
                        </td>
                    </tr>
                </div>
            </div>
            <tr>
                <td id="alert-msg-1" colspan="3"></td>
            </tr>
        </table>
        <div class="form-group">
            <table class="table text-center" id="table-3">
                <tr>
                    <th colspan="3">Podaci za unos</th>
                </tr>

            </table>
        </div>
        <div class="alert-danger jumbotron m-3 p-2 text-center">
            <h3 class="mt-3">Ukoliko ste zavrsili Vas unos molimo Vas potvrdite kliknom na dugme.</h3>
            <input type="submit" class="btn btn-danger m-3" name="submit" value="Potvrdi unos">

        </div>
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    </div>
    <?php
}else
    {
        echo "<div class='jumbotron alert-danger mt-10'>Nije Vam dozvoljen pristup ovoj stranici!</div>";
    }
?>