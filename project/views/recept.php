<?php
include "../views/nav/nav.php";
?>
<!-- Hero image slider -->
<?php
$page = $_GET['category'];
if (isset($_GET['category']))
{
    $page = $_GET['category'];
    include "../views/hero_image_slider";
}
?>
<!-- content --->
<div class="container-fluid mt-5" style="text-align:center">
    <h2><small class="text-muted"><?=$page = $_GET['category']?> recepti!</small></h2>
    <hr>
</div>
<?php
include "../views/content_for_recept.php";
?>
<!-- footer -->
<?php
include "../views/nav/footer.php";