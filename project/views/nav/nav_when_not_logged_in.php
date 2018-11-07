<?php
User::login();
$categories = Categories::getData("category_name");
?>
<body class="bg-light">
<div id="navigation" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark row">
        <a class="navbar-brand " href="index.html">Recept.ba</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Content" aria-controls="Content"
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
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">  <?php
                            foreach ($categories as $category)
                            {
                                ?>
                                <a class="dropdown-item" href="recept.php?category=<?=$category?>"><?=$category?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                    <li id="navigationItemLogin" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.html" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Loguj se
                        </a>
                        <div id="navigationItemLink" class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <form id="form_login" action="" method="post" class="dropdown-item bg-dark form-inline mr-0 my-2 my-lg-0 ">
                                <input type="text" class="form-control-sm dropdown-item bg-light mt-2"
                                       placeholder="Korisnicko ime" name="username"
                                       id="username">
                                <input type="password" class="form-control-sm dropdown-item bg-light mt-2 mb-2"
                                       name="password"
                                       placeholder="Sifra" id="pasvord">
                                <input type="submit" name="submit" value="Loguj se" id="loguj_se" class="btn btn-primary">
                                <a href="prijavi_se.php" class="btn btn-primary">Prijavite se</a>
                            </form>
                        </div>
                    </li>
                </ul>
                <form class="form-inline mr-0 my-2 my-lg-0" action="../views/search.php" method="post">
                    <input class="form-control ml-auto mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="submit">
                </form>
            </div>
        </div>
    </nav>
</div>