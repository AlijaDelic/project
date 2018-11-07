<?php
if ($user[1] == 1) {
    $categories = Categories::getData("category_name");
    $delete = Categories::delete();
    if ($delete === true)
    {
        echo "<div class='alert-success'>Obrisali ste kategoriju : ".$_POST['delete_category']."</div>";
    }
    if (isset($_POST["submit"])) {
        $cat_save = Categories::save();
        if ($cat_save === true) {
            echo "<div class='alert-success'>Uspjesno ste dodali novu kategoriju</div>";
        }
        else
        {
            echo "<div class='alert-danger'>Kategorija vec postoji.</div>";
        }
    }


    ?>
    <table class="table">
        <tr>
            <th colspan="2">Obrisite kategoriju odabirom iz liste (ako je kategorija dodijeljena nekom clanku, istu je nemoguce obrisati).</th>
        </tr>
        <tr>
            <td colspan="2">
                <form action="" method="post">
                    <select name="delete_category" class="form-control text-center">
                        <?php
                        foreach ($categories as $category) {
                            echo "<option class='text-center'>" . $category . "</option>";
                        }
                        ?>
                    </select>


            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="delete" value="Obrisite kategoriju" class="btn btn-danger"></td>
        </tr>
        </form>
        <tr>
            <th colspan="2">Dodaj novu kategoriju:</th>
        </tr>
        <tr>
            <td>
                <label for="category_name"><h4>Upisite ime kategorije:</h4></label>
            </td>

            <form action="" method="post">
                <td>
                    <input class="text-center form-control" type="text" name="category_name"
                           placeholder="Ime kategorije">
                </td>


        </tr>
        <tr>
            <td colspan="2">
                <input type='submit' class='btn btn-success' name="submit" value='Dodaj Kategoriju'>
            </td>
            </form>
        </tr>


    </table>
    <?php
}

?>
