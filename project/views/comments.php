<?php
if (sizeof($user) > 0) {
    $comment = Comments::save();
}
$msg = "<div class='alert-warning jumbotron text-center'>Da biste komentarisali morate biti <a href='../views/prijavi_se.php'>logovani</a>!</div>";
$msg1 = "<h4>Korisnik: " . $user[0] . "</h4>";
$comments = Comments::getData("c.comment_id, c.recipe_id, u.username, c.content", "WHERE c.recipe_id = '$id' ORDER BY c.comment_id LIMIT 5");
if (sizeof($comments) > 0) {
    for ($i = 0; $i < sizeof($comments); $i++) {
        $comm_id = $comments[$i]['comment_id'];
        ?>
        <div class="container">
            <div class="row ">
                <table class="table">
                    <td class="jumbotron text-center alert-heading m-0"><?= $comments[$i]['username'] ?> kaze: <br>

                        <div class="jumbotron bg-light alert-info m-0"><p><?= $comments[$i]['content'] ?></p></div>
                    </td>
                    <td class="jumbotron ml-2 text-center align-middle">
                        <?php
                        if ($user["0"] == $comments[$i]['username']) {
                            ?>
                            <a href="delete.php?delete_id=<?= $comm_id ?> "><i style="font-size: 40px"
                                                                               class="material-icons "> delete</i></a>
                            <?php
                        }
                        ?>
                    </td>

                </table>
            </div>
        </div>
        <?php
    }
}
?>
<div class="container ">
    <div class="row mt-3">
        <div class="col jumbotron">
            <div class="jumbotron alert-heading p-0 ml-1"><?= sizeof($user) > 0 ? $msg1 : $msg ?></div>
            <form class="form-group" action="" method="post">
                <textarea class="form-control" name="content" placeholder="Komentarisite ovde..."></textarea>
                <input type="submit" class="btn btn-success form-control mt-4" name="submit" value="Unesi komentar">
            </form>
        </div>
    </div>
</div>



