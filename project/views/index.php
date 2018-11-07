<!--Navigation-->
<?php
include "../views/nav/nav.php";
?>
<!-- Hero image slider -->
<?php
include "../views/hero_image_slider";
?>
<!-- Heading for latest news -->
<div class="container-fluid mt-3" style="text-align:center">
    <h2>
        <small class="text-muted">Najnoviji recepti!</small>
    </h2>
    <hr>
</div>
<!-- Content for latest news -->
<?php
include("latest_news.php");
?>
<!-- Search button -->
<div class="container-fluid jumbotron bg-dark">

    <div class="container">
        <div style="color:azure" class="row">
            <div style="text-align:right" class="col col-lg-6 col-md-6 col-sm-12">
                <h3>Trazite nesto?? Pokusajte ovde:</h3>
            </div>
            <div style="text-align:center;" class="col col-lg-6 col-md-6 col-sm-12">
                <form class="form-inline mr-0 my-2 my-lg-0">
                    <input class="form-control mr-sm-2 col" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 mr-5" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- Heading for top news -->
<div class="container-fluid mt-3" style="text-align:center">
    <h2>
        <small class="text-muted">Najbolji recepti!</small>
    </h2>
    <hr>
</div>
<!-- Top news content -->
<?php
include "top_news.php";
?>
<!-- Register button -->
<div style="text-align:center" class="container-fluid jumbotron bg-dark mt-5">
    <div style="color:azure" class="row">
        <div class="col">
            <h3>Kliknite <a href="prijavi_se.php">ovde</a> da se registrujete!!</h3>
        </div>
    </div>
</div>
<!-- Archive of all news -->
<div class="container-fluid mt-3" style="text-align:center">
    <h2>
        <small class="text-muted">Arhiva recepata</small>
    </h2>
    <hr>
</div>
<?php
include "archive_news.php";
?>
<!-- footer -->
<?php
include "../views/nav/footer.php";