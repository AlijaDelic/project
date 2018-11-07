<?php
include "../helpers/ClassLoader.php";
include "../views/nav/nav.php";
$id = $_GET['delete_id'];
$comm_page = Comments::getData("c.recipe_id", "WHERE c.comment_id = '$id'");
$recipe_id = $comm_page[0]['recipe_id'];
$delete = Comments::delete();
?>
<meta http-equiv="refresh" content="0;url=../views/articles.php?id=<?=$recipe_id?>">
