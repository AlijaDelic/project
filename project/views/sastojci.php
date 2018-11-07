<?php
require_once('../helpers/ClassLoader.php');
if ($user[1] == 1) {

    $ingridans = Ingridians::get_data();
    foreach ($_POST as $key => $val) {
        echo "<br>kljuc je :" . $key . "<br>a vrijednost: " . $val;
    }
    ?>

    <h3 class="alert-success m-3 p-3">U nastavku mozete dodati nove sastojke:</h3>

    <table class="table mt-3" id="table-1">
        <tr>
            <th colspan="3">Ovdje mozete vidjeti sastojke koji su vec u bazi.</th>
        </tr>


        <tr>
            <td colspan="3">
                <select name="choose_name" class="form-control" id="choosed_ingridian_name">
                    <option selected>Izaberite sastojak</option>
                    <?php
                    for ($y = 0; $y < sizeof($ingridans); $y++) {
                        ?>
                        <option class="form-control ingridians"
                                value="<?php echo $ingridans[$y]->name ?>"> <?php echo $ingridans[$y]->name ?> </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td id="alert-msg" colspan="3"></td>
        </tr>
    </table>
    <table class="table" id="table-2">
        <div class="form-group">
            <tr>
                <th colspan="3">Ukoliko vas sastojak ne postoji unesite ga ovde!!</th>
            </tr>
            <tr>
                <th>Sastojak:</th>
                <th>Kolicina:</th>
            </tr>
            <div id="load_more_fileds">
                <tr>
                    <td><input type="text" name="insert_name0" id="add_new_ingridian" class="form-control"
                               placeholder="sastojak"></td>
                    <td><input type="text" name="insert_amount0" id="add_new_ingridian_amount" class="form-control"
                               placeholder="kolicina"></td>
                    <td>
                        <div class="btn btn-info" id="add_new_button">Dodaj</div>
                    </td>
                </tr>
            </div>
        </div>
        <tr>
            <td id="alert-msg-1" colspan="3"></td>
        </tr>
    </table>

    <form action="" method="post">
        <div class="form-group">
            <table class="table" id="table-3">
                <tr>
                    <th colspan="3">Podaci za unos</th>
                </tr>
            </table>
        </div>

        <div class="alert-danger jumbotron m-3 p-2">
            <h3 class="mt-3">Ukoliko ste zavrsili Vas unos molimo Vas potvrdite kliknom na dugme.</h3>
            <input type="submit" class="btn btn-danger m-3" name="submit" value="Potvrdi unos">
        </div>

    </form>
    <?php
}
?>