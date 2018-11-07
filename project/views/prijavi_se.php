<?php
include "../views/nav/nav.php";
    $errors = User::save();
    if (isset($_POST['submit']) && sizeof($errors) > 0){
    ?>
        <div class="container text-center">
        <div class="jumbotron alert-danger">
            <?php
               foreach ($errors as $error){
                   echo $error . "<br>";
            }
            ?>
        </div>
        </div>
        <?php
    }else if (isset($_POST['submit']) && sizeof($errors) == 0){
        ?>
        <div class="container text-center">
            <div class="jumbotron alert-success">
                <p>Registracija uspjela!!<br> Sada se mozete logovati sa vasim podacima.</p>
            </div>
        </div>
        <?php
    };

    if(User::getLoggedInUser() === null){
        ?>

<body class="bg-light">
    <!-- Application form -->
    <div class="container">
        <div class="row jumbotron mt-3">
            <h3>Za prijavu na stranicu molimo Vas da popunite sva polja.</h3>
        </div>
        <div class="row jumbotron mt-3">
            <div class="col">
                <form class="from-control" action="" method="post">
                    <label for="f_name">Upisite Vase ime:</label>
                    <input type="text" class="form-control" placeholder="Ime" name="name">
                    <label for="l_name">Upisite Vase prezime:</label>
                    <input type="text" class="form-control" placeholder="Prezime" name="s_name">
                    <label for="e-mail">Upisite Vas e-mail:</label>
                    <input type="text" class="form-control" placeholder="ime_prezime@mail.com" name="email">
                    <label for="username">Upisite korisnicko ime kojim zelite da se prijavljujete:</label>
                    <input type="text" class="form-control" placeholder="ime_prezime123" name="username">
                    <label for="password">Upisite Vas pasvord koji zelite koristiti:</label>
                    <input type="password" class="form-control" placeholder="Pasvord123" name="password">
                    <label for="password1">Molimo ponovite Vas pasvord:</label>
                    <input type="password" class="form-control" placeholder="Pasvord123" name="password1">
                    <input type="submit" name="submit" value="Prijavi se" class="form-control btn btn-outline-dark mt-3">
                </form>
            </div>

        </div>
    </div>

    <!-- footer-->
<?php
        include "../views/nav/footer.php";
}else{
        header("location: index.php");
}