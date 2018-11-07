<?php
if ($user[1] != 1) {
    header("location:../views/index.php");
    return;
}
if ($_GET['type'] = 'Korisnici') {
    $errors = User::saveAsAdministrator();
}
if (isset($_POST['submit']) && sizeof($errors) > 0) {

    ?>
    <div class="container text-center">
        <div class="jumbotron alert-danger">
            <?php
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            ?>
        </div>
    </div>
    <?php
} else if (isset($_POST['submit']) && sizeof($errors) == 0) {
    $errors = User::saveAsAdministrator();
    ?>
    <div class="container text-center">
        <div class="jumbotron alert-success">
            <p>Registracija uspjela!!</p>
        </div>
    </div>
    <?php
};
?>
<div class="row">
    <div class="col"><h4>Popunite sva polja da biste dodali novog korisnika</h4></div>
</div>
<div class="row">
    <div class="col">
        <form class="from-control text-center" action="" method="post">
            <div style="margin-top: 4px" class="form-group">
                <label class="text-center mt-2" for="f_name">Upisite ime Korisnika:</label>
                <input type="text" class="form-control text-center mt-2" placeholder="Ime" name="name">
                <label class="text-center mt-2" for="l_name">Upisite prezime:</label>
                <input type="text" class="form-control text-center mt-2" placeholder="Prezime" name="s_name">
                <label class="text-center mt-2" for="e-mail">Upisite e-mail:</label>
                <input type="text" class="form-control text-center mt-2" placeholder="ime_prezime@mail.com" name="email">
                <label class="text-center mt-2" for="username">Upisite korisnicko ime za korisnika:</label>
                <input type="text" class="form-control text-center mt-2" placeholder="ime_prezime123" name="username">
                <label class="text-center mt-2" for="password">Upisite Vas pasvord za korisnika:</label>
                <input type="password" class="form-control text-center mt-2" placeholder="Pasvord123" name="password">
                <label class="text-center mt-2" for="password1">Molimo ponovite pasvord:</label>
                <input type="password" class="form-control text-center mt-2" placeholder="Pasvord123" name="password1">
                <label class="text-center mt-2" for="role">Izaberite privilegije za korisnika:</label>
                <select class="text-center mt-2 form-control" name="role_id" id="role">
                    <option value="1">Administrator</option>
                    <option value="2" selected>Visitor</option>
                </select>
                <input type="submit" name="submit" value="Prijavi Korisnika"
                       class="text-center mt-2 form-control btn btn-outline-dark mt-3">
            </div>
        </form>
    </div>
</div>
