<?php
    include "../helpers/ClassLoader.php";
    $categories = Categories::getData("category_name");
?>
<body class="bg-light">
<div id="navigation" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <a class="navbar-brand " href="index.html">Recept.ba</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Content"
                aria-controls="Content"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse" id="Content">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Naslovna <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown" id="navbarDropdown">
                        <a class="nav-link dropdown-toggle" href="index.html" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Recept
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            foreach ($categories as $category)
                            {
                                ?>
                                <a class="dropdown-item" href="recept.php?category=<?=$category?>"><?=$category?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" id="log_out" href="administration.php">Administration</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" id="log_out" href="index.php?Odjava=true">Odjavi se</a>
                    </li>
                </ul>
                <form class="form-inline mr-0 my-2 my-lg-0" action="../views/search.php" method="post">
                    <input class="form-control ml-auto mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div style="padding: 7px 7px; margin: 10px" class="jumbotron alert-success" id="session_user">
                    Dobrodosli: <?php echo $user[0]; ?>
                </div>

            </div>
        </div>
    </nav>

</div>