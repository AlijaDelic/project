<?php
include "../views/nav/nav.php";
include "../helpers/ClassLoader.php";
include "../views/nav/admin_navigation.php";
$user = User::getLoggedInUser();
if ($user[1] == 1) {

    ?>

<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <div class="jumbotron">

                <?php
                if (isset($_GET['type']) && $_GET['type'] == 'clanci') {
                    include "../views/clanci.php";
                }
                if (isset($_GET['type']) && $_GET['type'] == 'Korisnici') {
                    include "../views/korisnici.php";
                }
                if (isset($_GET['type']) && $_GET['type'] == 'Kategorije') {
                    include "../views/kategorije.php";
                }
                ?>
            </div>
        </div>
    </div>
</div>


</body>

</html>
<?php
}else{
echo "<div class='jumbotron alert-danger container-fluid text-center mt-10'><h1>Nije Vam dozvoljen pristup ovoj strani, prijavite se ili <a href='../views/prijavi_se.php'> registrujte</a></h1></div>";
}
?>